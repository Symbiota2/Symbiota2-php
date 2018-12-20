<?php

namespace App\Repository;

use App\Entity\Omoccurgenetic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurgenetic|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurgenetic|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurgenetic[]    findAll()
 * @method Omoccurgenetic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurgeneticRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurgenetic::class);
    }

    // /**
    //  * @return Omoccurgenetic[] Returns an array of Omoccurgenetic objects
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
    public function findOneBySomeField($value): ?Omoccurgenetic
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
