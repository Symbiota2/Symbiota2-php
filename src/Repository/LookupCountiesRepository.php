<?php

namespace App\Repository;

use App\Entity\LookupCounties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupCounties|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupCounties|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupCounties[]    findAll()
 * @method LookupCounties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupCountiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupCounties::class);
    }

    // /**
    //  * @return LookupCounties[] Returns an array of LookupCounties objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LookupCounties
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
