<?php

namespace App\Repository;

use App\Entity\Geothescountry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geothescountry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geothescountry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geothescountry[]    findAll()
 * @method Geothescountry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeothescountryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geothescountry::class);
    }

    // /**
    //  * @return Geothescountry[] Returns an array of Geothescountry objects
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
    public function findOneBySomeField($value): ?Geothescountry
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
