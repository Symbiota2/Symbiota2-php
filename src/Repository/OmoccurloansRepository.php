<?php

namespace App\Repository;

use App\Entity\Omoccurloans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurloans|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurloans|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurloans[]    findAll()
 * @method Omoccurloans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurloansRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurloans::class);
    }

    // /**
    //  * @return Omoccurloans[] Returns an array of Omoccurloans objects
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
    public function findOneBySomeField($value): ?Omoccurloans
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
