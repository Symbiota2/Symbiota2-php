<?php

namespace App\Repository;

use App\Entity\Taxadescrstmts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxadescrstmts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxadescrstmts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxadescrstmts[]    findAll()
 * @method Taxadescrstmts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxadescrstmtsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxadescrstmts::class);
    }

    // /**
    //  * @return Taxadescrstmts[] Returns an array of Taxadescrstmts objects
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
    public function findOneBySomeField($value): ?Taxadescrstmts
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
