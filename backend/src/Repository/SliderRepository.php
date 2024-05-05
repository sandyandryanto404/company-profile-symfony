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

use App\Entity\Slider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Slider>
 *
 * @method Slider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slider[]    findAll()
 * @method Slider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SliderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slider::class);
    }

    public function getAll()
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.status = 1')
            ->orderBy('x.sort')
            ->getQuery()
            ->getResult();
    }
}