<?php

namespace App\Repository;

use App\Entity\OccurrenceDuplicates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceDuplicates|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceDuplicates|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceDuplicates[]    findAll()
 * @method OccurrenceDuplicates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceDuplicatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceDuplicates::class);
    }

    // /**
    //  * @return OccurrenceDuplicates[] Returns an array of OccurrenceDuplicates objects
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
    public function findOneBySomeField($value): ?OccurrenceDuplicates
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
