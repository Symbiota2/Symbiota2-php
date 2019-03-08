<?php

namespace App\Repository;

use App\Entity\OccurrenceDatasetLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceDatasetLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceDatasetLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceDatasetLink[]    findAll()
 * @method OccurrenceDatasetLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceDatasetLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceDatasetLink::class);
    }

    // /**
    //  * @return OccurrenceDatasetLink[] Returns an array of OccurrenceDatasetLink objects
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
    public function findOneBySomeField($value): ?OccurrenceDatasetLink
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
