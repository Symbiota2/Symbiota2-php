<?php

namespace App\Repository;

use App\Entity\OccurrenceDeterminations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceDeterminations|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceDeterminations|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceDeterminations[]    findAll()
 * @method OccurrenceDeterminations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceDeterminationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceDeterminations::class);
    }

    // /**
    //  * @return OccurrenceDeterminations[] Returns an array of OccurrenceDeterminations objects
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
    public function findOneBySomeField($value): ?OccurrenceDeterminations
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
