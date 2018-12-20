<?php

namespace App\Repository;

use App\Entity\Taxavernaculars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxavernaculars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxavernaculars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxavernaculars[]    findAll()
 * @method Taxavernaculars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxavernacularsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxavernaculars::class);
    }

    // /**
    //  * @return Taxavernaculars[] Returns an array of Taxavernaculars objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Taxavernaculars
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
