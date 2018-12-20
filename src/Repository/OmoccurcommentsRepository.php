<?php

namespace App\Repository;

use App\Entity\Omoccurcomments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurcomments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurcomments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurcomments[]    findAll()
 * @method Omoccurcomments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurcommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurcomments::class);
    }

    // /**
    //  * @return Omoccurcomments[] Returns an array of Omoccurcomments objects
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
    public function findOneBySomeField($value): ?Omoccurcomments
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
