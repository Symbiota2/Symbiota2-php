<?php

namespace App\Repository;

use App\Entity\Omoccurrevisions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurrevisions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurrevisions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurrevisions[]    findAll()
 * @method Omoccurrevisions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurrevisionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurrevisions::class);
    }

    // /**
    //  * @return Omoccurrevisions[] Returns an array of Omoccurrevisions objects
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
    public function findOneBySomeField($value): ?Omoccurrevisions
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
