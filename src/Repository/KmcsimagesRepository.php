<?php

namespace App\Repository;

use App\Entity\Kmcsimages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmcsimages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmcsimages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmcsimages[]    findAll()
 * @method Kmcsimages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmcsimagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmcsimages::class);
    }

    // /**
    //  * @return Kmcsimages[] Returns an array of Kmcsimages objects
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
    public function findOneBySomeField($value): ?Kmcsimages
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
