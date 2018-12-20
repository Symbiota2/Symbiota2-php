<?php

namespace App\Repository;

use App\Entity\Specprocessorrawlabels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocessorrawlabels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocessorrawlabels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocessorrawlabels[]    findAll()
 * @method Specprocessorrawlabels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocessorrawlabelsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocessorrawlabels::class);
    }

    // /**
    //  * @return Specprocessorrawlabels[] Returns an array of Specprocessorrawlabels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Specprocessorrawlabels
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
