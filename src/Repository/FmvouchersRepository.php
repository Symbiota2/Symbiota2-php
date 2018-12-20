<?php

namespace App\Repository;

use App\Entity\Fmvouchers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmvouchers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmvouchers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmvouchers[]    findAll()
 * @method Fmvouchers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmvouchersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmvouchers::class);
    }

    // /**
    //  * @return Fmvouchers[] Returns an array of Fmvouchers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fmvouchers
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
