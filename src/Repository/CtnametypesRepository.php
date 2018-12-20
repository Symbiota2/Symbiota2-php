<?php

namespace App\Repository;

use App\Entity\Ctnametypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ctnametypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ctnametypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ctnametypes[]    findAll()
 * @method Ctnametypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CtnametypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ctnametypes::class);
    }

    // /**
    //  * @return Ctnametypes[] Returns an array of Ctnametypes objects
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
    public function findOneBySomeField($value): ?Ctnametypes
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
