<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto404@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace App\Repository;

use App\Entity\ArticleComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @extends ServiceEntityRepository<ArticleComment>
 *
 * @method ArticleComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleComment[]    findAll()
 * @method ArticleComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleComment::class);
    }

    public function saveOrUpdate(ArticleComment $contact){
        $this->getEntityManager()->persist($contact);
        $this->getEntityManager()->flush();
    }

    public function buildComment($id)
    {
        $sql = "
            SELECT 
                c.id, 
                IFNULL(c.parent_id, 0) parent_id, 
                c.comment, 
                c.created_at,
                u.first_name,
                u.last_name,
                u.gender,
                u.image 
            FROM articles_comments c
            INNER JOIN users u ON u.id = c.user_id
            WHERE c.article_id = ".$id."
            ORDER BY c.id DESC
        ";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sql);
        $result = $stmt->executeQuery()->fetchAllAssociative();
        return self::buildTree($result, 0);
    }

    private static function buildTree(array &$elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }else{
                    $element['children'] = [];
                }
                $branch[] = $element;
                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }
    
}