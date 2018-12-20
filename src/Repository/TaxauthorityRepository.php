<?php

namespace App\Repository;

use App\Entity\Taxauthority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxauthority|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxauthority|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxauthority[]    findAll()
 * @method Taxauthority[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxauthorityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxauthority::class);
    }

    // /**
    //  * @return Taxauthority[] Returns an array of Taxauthority objects
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
    public function findOneBySomeField($value): ?Taxauthority
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
