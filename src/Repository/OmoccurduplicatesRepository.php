<?php

namespace App\Repository;

use App\Entity\Omoccurduplicates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurduplicates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurduplicates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurduplicates[]    findAll()
 * @method Omoccurduplicates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurduplicatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurduplicates::class);
    }

    // /**
    //  * @return Omoccurduplicates[] Returns an array of Omoccurduplicates objects
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
    public function findOneBySomeField($value): ?Omoccurduplicates
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
