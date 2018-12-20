<?php

namespace App\Repository;

use App\Entity\Omoccurverification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurverification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurverification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurverification[]    findAll()
 * @method Omoccurverification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurverificationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurverification::class);
    }

    // /**
    //  * @return Omoccurverification[] Returns an array of Omoccurverification objects
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
    public function findOneBySomeField($value): ?Omoccurverification
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
