<?php

namespace App\Repository;

use App\Entity\Lkupcountry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lkupcountry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lkupcountry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lkupcountry[]    findAll()
 * @method Lkupcountry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LkupcountryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lkupcountry::class);
    }

    // /**
    //  * @return Lkupcountry[] Returns an array of Lkupcountry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lkupcountry
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
