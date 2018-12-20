<?php

namespace App\Repository;

use App\Entity\Adminstats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Adminstats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adminstats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adminstats[]    findAll()
 * @method Adminstats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminstatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Adminstats::class);
    }

    // /**
    //  * @return Adminstats[] Returns an array of Adminstats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adminstats
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
