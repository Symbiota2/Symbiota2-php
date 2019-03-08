<?php

namespace App\Repository;

use App\Entity\OccurrenceFullText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceFullText|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceFullText|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceFullText[]    findAll()
 * @method OccurrenceFullText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceFullTextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceFullText::class);
    }

    // /**
    //  * @return OccurrenceFullText[] Returns an array of OccurrenceFullText objects
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
    public function findOneBySomeField($value): ?OccurrenceFullText
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
