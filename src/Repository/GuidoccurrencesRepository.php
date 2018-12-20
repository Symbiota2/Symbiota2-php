<?php

namespace App\Repository;

use App\Entity\Guidoccurrences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Guidoccurrences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guidoccurrences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guidoccurrences[]    findAll()
 * @method Guidoccurrences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidoccurrencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Guidoccurrences::class);
    }

    // /**
    //  * @return Guidoccurrences[] Returns an array of Guidoccurrences objects
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
    public function findOneBySomeField($value): ?Guidoccurrences
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
