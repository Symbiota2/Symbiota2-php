<?php

namespace App\Repository;

use App\Entity\CollectionStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CollectionStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectionStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectionStats[]    findAll()
 * @method CollectionStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionStatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CollectionStats::class);
    }

    // /**
    //  * @return CollectionStats[] Returns an array of CollectionStats objects
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
    public function findOneBySomeField($value): ?CollectionStats
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
