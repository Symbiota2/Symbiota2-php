<?php

namespace App\Repository;

use App\Entity\Kmcharheading;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmcharheading|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmcharheading|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmcharheading[]    findAll()
 * @method Kmcharheading[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmcharheadingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmcharheading::class);
    }

    // /**
    //  * @return Kmcharheading[] Returns an array of Kmcharheading objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kmcharheading
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
