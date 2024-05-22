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

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findByRandomResult($status = 0,  $limit = 1)
    {
        return $this->createQueryBuilder('u')
            ->addSelect('RAND() as HIDDEN rand')
            ->andWhere('u.status = :status')
            ->setParameter('status', $status)
            ->setMaxResults($limit)
            ->orderBy('rand()')
            ->getQuery()
            ->getResult();
    }

    public function findByRandom($id, $status = 0,  $limit = 1)
    {
        return $this->createQueryBuilder('u')
            ->addSelect('RAND() as HIDDEN rand')
            ->andWhere('u.id != :val')
            ->andWhere('u.status != :status')
            ->setParameter('val', $id)
            ->setParameter('status', $status)
            ->setMaxResults($limit)
            ->orderBy('rand()')
            ->getQuery()
            ->getResult();
    }

    public function getStories($limit = 1){
        return $this->createQueryBuilder('x')
            ->andWhere('x.status = 1')
            ->setMaxResults($limit)
            ->orderBy('x.id', 'DESC')
            ->innerJoin("x.user", "u")
            ->getQuery()
            ->getResult();
    }

    public function getNew(){
        return $this->createQueryBuilder('x')
            ->select($this->columns())
            ->andWhere('x.status = 1')
            ->orderBy('x.id', 'DESC')
            ->innerJoin("x.user", "u")
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getNews($id){
        return $this->createQueryBuilder('x')
            ->select($this->columns())
            ->andWhere('x.id != :val')
            ->andWhere('x.status = 1')
            ->setParameter('val', $id)
            ->innerJoin("x.user", "u")
            ->setMaxResults(3)
            ->orderBy('x.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBySlug($slug){
        return $this->createQueryBuilder('x')
            ->andWhere('x.slug = :val')
            ->setParameter('val', $slug)
            ->innerJoin("x.user", "u")
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findById($id){
        return $this->createQueryBuilder('x')
            ->andWhere('x.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function checkContinue($limit = 0){
        $total = (int) $this->createQueryBuilder('x')->select('count(x.id)')->where("x.status = 1")->getQuery()->getSingleScalarResult();
        return $limit <= $total;
    }

    private function columns(){
        return [
            "x.id", 
            "x.slug", 
            "x.title",
            "x.description",
            "x.createdAt",
            "u.firstName",
            "u.lastName",
            "u.gender",
            "u.aboutMe"
        ];
    }
}