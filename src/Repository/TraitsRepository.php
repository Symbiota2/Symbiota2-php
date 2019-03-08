<?php

namespace App\Repository;

use App\Entity\Traits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traits[]    findAll()
 * @method Traits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraitsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Traits::class);
    }

    // /**
    //  * @return Traits[] Returns an array of Traits objects
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
    public function findOneBySomeField($value): ?Traits
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
