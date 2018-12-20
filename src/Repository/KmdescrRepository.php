<?php

namespace App\Repository;

use App\Entity\Kmdescr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmdescr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmdescr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmdescr[]    findAll()
 * @method Kmdescr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmdescrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmdescr::class);
    }

    // /**
    //  * @return Kmdescr[] Returns an array of Kmdescr objects
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
    public function findOneBySomeField($value): ?Kmdescr
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
