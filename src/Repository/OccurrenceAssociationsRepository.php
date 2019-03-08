<?php

namespace App\Repository;

use App\Entity\OccurrenceAssociations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceAssociations|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceAssociations|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceAssociations[]    findAll()
 * @method OccurrenceAssociations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceAssociationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceAssociations::class);
    }

    // /**
    //  * @return OccurrenceAssociations[] Returns an array of OccurrenceAssociations objects
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
    public function findOneBySomeField($value): ?OccurrenceAssociations
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
