<?php

namespace App\Repository;

use App\Entity\Omoccurexchange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurexchange|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurexchange|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurexchange[]    findAll()
 * @method Omoccurexchange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurexchangeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurexchange::class);
    }

    // /**
    //  * @return Omoccurexchange[] Returns an array of Omoccurexchange objects
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
    public function findOneBySomeField($value): ?Omoccurexchange
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
