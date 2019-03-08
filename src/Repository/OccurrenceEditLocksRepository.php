<?php

namespace App\Repository;

use App\Entity\OccurrenceEditLocks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceEditLocks|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceEditLocks|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceEditLocks[]    findAll()
 * @method OccurrenceEditLocks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceEditLocksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceEditLocks::class);
    }

    // /**
    //  * @return OccurrenceEditLocks[] Returns an array of OccurrenceEditLocks objects
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
    public function findOneBySomeField($value): ?OccurrenceEditLocks
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
