<?php

namespace App\Repository;

use App\Entity\Guidimages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Guidimages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guidimages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guidimages[]    findAll()
 * @method Guidimages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidimagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Guidimages::class);
    }

    // /**
    //  * @return Guidimages[] Returns an array of Guidimages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Guidimages
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
