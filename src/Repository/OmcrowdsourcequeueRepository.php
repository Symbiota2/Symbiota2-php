<?php

namespace App\Repository;

use App\Entity\Omcrowdsourcequeue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcrowdsourcequeue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcrowdsourcequeue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcrowdsourcequeue[]    findAll()
 * @method Omcrowdsourcequeue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcrowdsourcequeueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcrowdsourcequeue::class);
    }

    // /**
    //  * @return Omcrowdsourcequeue[] Returns an array of Omcrowdsourcequeue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omcrowdsourcequeue
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
