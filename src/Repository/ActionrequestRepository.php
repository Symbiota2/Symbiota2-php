<?php

namespace App\Repository;

use App\Entity\Actionrequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Actionrequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actionrequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actionrequest[]    findAll()
 * @method Actionrequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionrequestRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actionrequest::class);
    }

    // /**
    //  * @return Actionrequest[] Returns an array of Actionrequest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Actionrequest
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
