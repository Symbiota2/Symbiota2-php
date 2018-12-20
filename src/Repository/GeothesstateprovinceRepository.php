<?php

namespace App\Repository;

use App\Entity\Geothesstateprovince;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geothesstateprovince|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geothesstateprovince|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geothesstateprovince[]    findAll()
 * @method Geothesstateprovince[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeothesstateprovinceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geothesstateprovince::class);
    }

    // /**
    //  * @return Geothesstateprovince[] Returns an array of Geothesstateprovince objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geothesstateprovince
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
