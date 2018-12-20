<?php

namespace App\Repository;

use App\Entity\Omoccurpoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurpoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurpoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurpoints[]    findAll()
 * @method Omoccurpoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurpointsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurpoints::class);
    }

    // /**
    //  * @return Omoccurpoints[] Returns an array of Omoccurpoints objects
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
    public function findOneBySomeField($value): ?Omoccurpoints
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
