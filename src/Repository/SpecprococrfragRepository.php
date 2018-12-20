<?php

namespace App\Repository;

use App\Entity\Specprococrfrag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprococrfrag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprococrfrag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprococrfrag[]    findAll()
 * @method Specprococrfrag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprococrfragRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprococrfrag::class);
    }

    // /**
    //  * @return Specprococrfrag[] Returns an array of Specprococrfrag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Specprococrfrag
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
