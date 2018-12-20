<?php

namespace App\Repository;

use App\Entity\Ctrelationshiptypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ctrelationshiptypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ctrelationshiptypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ctrelationshiptypes[]    findAll()
 * @method Ctrelationshiptypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CtrelationshiptypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ctrelationshiptypes::class);
    }

    // /**
    //  * @return Ctrelationshiptypes[] Returns an array of Ctrelationshiptypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ctrelationshiptypes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
