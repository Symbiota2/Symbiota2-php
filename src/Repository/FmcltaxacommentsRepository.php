<?php

namespace App\Repository;

use App\Entity\Fmcltaxacomments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmcltaxacomments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmcltaxacomments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmcltaxacomments[]    findAll()
 * @method Fmcltaxacomments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmcltaxacommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmcltaxacomments::class);
    }

    // /**
    //  * @return Fmcltaxacomments[] Returns an array of Fmcltaxacomments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fmcltaxacomments
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
