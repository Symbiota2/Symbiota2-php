<?php

namespace App\Repository;

use App\Entity\Chotomouskey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chotomouskey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chotomouskey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chotomouskey[]    findAll()
 * @method Chotomouskey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChotomouskeyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chotomouskey::class);
    }

    // /**
    //  * @return Chotomouskey[] Returns an array of Chotomouskey objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chotomouskey
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
