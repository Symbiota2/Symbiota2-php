<?php

namespace App\Repository;

use App\Entity\Fmchklsttaxastatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmchklsttaxastatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmchklsttaxastatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmchklsttaxastatus[]    findAll()
 * @method Fmchklsttaxastatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmchklsttaxastatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmchklsttaxastatus::class);
    }

    // /**
    //  * @return Fmchklsttaxastatus[] Returns an array of Fmchklsttaxastatus objects
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
    public function findOneBySomeField($value): ?Fmchklsttaxastatus
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
