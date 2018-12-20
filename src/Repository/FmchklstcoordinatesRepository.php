<?php

namespace App\Repository;

use App\Entity\Fmchklstcoordinates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmchklstcoordinates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmchklstcoordinates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmchklstcoordinates[]    findAll()
 * @method Fmchklstcoordinates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmchklstcoordinatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmchklstcoordinates::class);
    }

    // /**
    //  * @return Fmchklstcoordinates[] Returns an array of Fmchklstcoordinates objects
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
    public function findOneBySomeField($value): ?Fmchklstcoordinates
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
