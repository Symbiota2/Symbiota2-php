<?php

namespace App\Repository;

use App\Entity\OccurrenceIdentifiers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceIdentifiers|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceIdentifiers|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceIdentifiers[]    findAll()
 * @method OccurrenceIdentifiers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceIdentifiersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceIdentifiers::class);
    }

    // /**
    //  * @return OccurrenceIdentifiers[] Returns an array of OccurrenceIdentifiers objects
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
    public function findOneBySomeField($value): ?OccurrenceIdentifiers
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
