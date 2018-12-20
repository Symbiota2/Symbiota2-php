<?php

namespace App\Repository;

use App\Entity\Guidoccurdeterminations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Guidoccurdeterminations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guidoccurdeterminations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guidoccurdeterminations[]    findAll()
 * @method Guidoccurdeterminations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidoccurdeterminationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Guidoccurdeterminations::class);
    }

    // /**
    //  * @return Guidoccurdeterminations[] Returns an array of Guidoccurdeterminations objects
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
    public function findOneBySomeField($value): ?Guidoccurdeterminations
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
