<?php

namespace App\Repository;

use App\Entity\Kmcs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmcs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmcs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmcs[]    findAll()
 * @method Kmcs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmcsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmcs::class);
    }

    // /**
    //  * @return Kmcs[] Returns an array of Kmcs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kmcs
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
