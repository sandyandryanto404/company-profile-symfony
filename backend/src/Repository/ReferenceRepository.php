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

use App\Entity\Reference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reference>
 *
 * @method Reference|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reference|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reference[]    findAll()
 * @method Reference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reference::class);
    }

    public function findAllByRandomArticle($limit = 1)
    {
        return $this->createQueryBuilder('u')
            ->addSelect('RAND() as HIDDEN rand')
            ->andWhere('u.type != :val')
            ->setParameter('val', 3)
            ->setMaxResults($limit)
            ->orderBy('rand()')
            ->getQuery()
            ->getResult();
    }

    public function findByRandom($type)
    {
         return $this->createQueryBuilder('u')
            ->addSelect('RAND() as HIDDEN rand')
            ->andWhere('u.type = :val')
            ->setParameter('val', $type)
            ->setMaxResults(1)
            ->orderBy('rand()')
            ->getQuery()
            ->getOneOrNullResult();
    }
}