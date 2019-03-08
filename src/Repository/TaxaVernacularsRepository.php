<?php

namespace App\Repository;

use App\Entity\TaxaVernaculars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaVernaculars|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaVernaculars|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaVernaculars[]    findAll()
 * @method TaxaVernaculars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaVernacularsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaVernaculars::class);
    }

    // /**
    //  * @return TaxaVernaculars[] Returns an array of TaxaVernaculars objects
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
    public function findOneBySomeField($value): ?TaxaVernaculars
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
