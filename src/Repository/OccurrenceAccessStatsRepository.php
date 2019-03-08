<?php

namespace App\Repository;

use App\Entity\OccurrenceAccessStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceAccessStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceAccessStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceAccessStats[]    findAll()
 * @method OccurrenceAccessStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceAccessStatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceAccessStats::class);
    }

    // /**
    //  * @return OccurrenceAccessStats[] Returns an array of OccurrenceAccessStats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OccurrenceAccessStats
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
