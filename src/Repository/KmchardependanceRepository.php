<?php

namespace App\Repository;

use App\Entity\Kmchardependance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmchardependance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmchardependance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmchardependance[]    findAll()
 * @method Kmchardependance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmchardependanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmchardependance::class);
    }

    // /**
    //  * @return Kmchardependance[] Returns an array of Kmchardependance objects
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
    public function findOneBySomeField($value): ?Kmchardependance
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
