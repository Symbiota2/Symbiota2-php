<?php

namespace App\Repository;

use App\Entity\OccurrenceDatasets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceDatasets|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceDatasets|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceDatasets[]    findAll()
 * @method OccurrenceDatasets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceDatasetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceDatasets::class);
    }

    // /**
    //  * @return OccurrenceDatasets[] Returns an array of OccurrenceDatasets objects
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
    public function findOneBySomeField($value): ?OccurrenceDatasets
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
