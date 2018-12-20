<?php

namespace App\Repository;

use App\Entity\Geothescontinent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geothescontinent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geothescontinent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geothescontinent[]    findAll()
 * @method Geothescontinent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeothescontinentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geothescontinent::class);
    }

    // /**
    //  * @return Geothescontinent[] Returns an array of Geothescontinent objects
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
    public function findOneBySomeField($value): ?Geothescontinent
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
