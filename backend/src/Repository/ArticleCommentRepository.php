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
        $entityManager =  $this->getEntityManager();
        $rsm = new ResultSetMapping();
        $query = $entityManager->createNativeQuery('SELECT id, email FROM users WHERE email = ?', $rsm);
        $query->setParameter(1, 'Price.Casper@example.org');
        
        $users = $query->getResult();

       return $users;
    }

    private static function buildTree(array &$elements, $parentId = 0) {
        
    }
    
}