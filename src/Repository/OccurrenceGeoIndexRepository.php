<?php

namespace App\Repository;

use App\Entity\OccurrenceGeoIndex;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceGeoIndex|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceGeoIndex|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceGeoIndex[]    findAll()
 * @method OccurrenceGeoIndex[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceGeoIndexRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceGeoIndex::class);
    }

    // /**
    //  * @return OccurrenceGeoIndex[] Returns an array of OccurrenceGeoIndex objects
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
    public function findOneBySomeField($value): ?OccurrenceGeoIndex
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
