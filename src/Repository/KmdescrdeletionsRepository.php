<?php

namespace App\Repository;

use App\Entity\Kmdescrdeletions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmdescrdeletions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmdescrdeletions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmdescrdeletions[]    findAll()
 * @method Kmdescrdeletions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmdescrdeletionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmdescrdeletions::class);
    }

    // /**
    //  * @return Kmdescrdeletions[] Returns an array of Kmdescrdeletions objects
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
    public function findOneBySomeField($value): ?Kmdescrdeletions
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
