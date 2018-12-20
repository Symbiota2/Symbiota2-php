<?php

namespace App\Repository;

use App\Entity\Specprocessorrawlabelsfulltext;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocessorrawlabelsfulltext|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocessorrawlabelsfulltext|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocessorrawlabelsfulltext[]    findAll()
 * @method Specprocessorrawlabelsfulltext[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocessorrawlabelsfulltextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocessorrawlabelsfulltext::class);
    }

    // /**
    //  * @return Specprocessorrawlabelsfulltext[] Returns an array of Specprocessorrawlabelsfulltext objects
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
    public function findOneBySomeField($value): ?Specprocessorrawlabelsfulltext
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
