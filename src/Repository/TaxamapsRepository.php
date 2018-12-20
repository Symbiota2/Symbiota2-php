<?php

namespace App\Repository;

use App\Entity\Taxamaps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxamaps|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxamaps|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxamaps[]    findAll()
 * @method Taxamaps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxamapsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxamaps::class);
    }

    // /**
    //  * @return Taxamaps[] Returns an array of Taxamaps objects
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
    public function findOneBySomeField($value): ?Taxamaps
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
