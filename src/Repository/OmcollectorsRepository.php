<?php

namespace App\Repository;

use App\Entity\Omcollectors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcollectors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcollectors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcollectors[]    findAll()
 * @method Omcollectors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcollectorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcollectors::class);
    }

    // /**
    //  * @return Omcollectors[] Returns an array of Omcollectors objects
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
    public function findOneBySomeField($value): ?Omcollectors
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
