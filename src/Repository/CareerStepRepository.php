<?php

namespace App\Repository;

use App\Entity\CareerStep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CareerStep|null find($id, $lockMode = null, $lockVersion = null)
 * @method CareerStep|null findOneBy(array $criteria, array $orderBy = null)
 * @method CareerStep[]    findAll()
 * @method CareerStep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CareerStepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CareerStep::class);
    }

    // /**
    //  * @return CareerStep[] Returns an array of CareerStep objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CareerStep
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
