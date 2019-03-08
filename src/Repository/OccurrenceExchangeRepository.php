<?php

namespace App\Repository;

use App\Entity\OccurrenceExchange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceExchange|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceExchange|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceExchange[]    findAll()
 * @method OccurrenceExchange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceExchangeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceExchange::class);
    }

    // /**
    //  * @return OccurrenceExchange[] Returns an array of OccurrenceExchange objects
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
    public function findOneBySomeField($value): ?OccurrenceExchange
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
