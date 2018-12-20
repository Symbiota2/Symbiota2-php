<?php

namespace App\Repository;

use App\Entity\Lkupstateprovince;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lkupstateprovince|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lkupstateprovince|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lkupstateprovince[]    findAll()
 * @method Lkupstateprovince[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LkupstateprovinceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lkupstateprovince::class);
    }

    // /**
    //  * @return Lkupstateprovince[] Returns an array of Lkupstateprovince objects
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
    public function findOneBySomeField($value): ?Lkupstateprovince
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
