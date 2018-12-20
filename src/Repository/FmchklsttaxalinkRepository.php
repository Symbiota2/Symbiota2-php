<?php

namespace App\Repository;

use App\Entity\Fmchklsttaxalink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmchklsttaxalink|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmchklsttaxalink|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmchklsttaxalink[]    findAll()
 * @method Fmchklsttaxalink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmchklsttaxalinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmchklsttaxalink::class);
    }

    // /**
    //  * @return Fmchklsttaxalink[] Returns an array of Fmchklsttaxalink objects
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
    public function findOneBySomeField($value): ?Fmchklsttaxalink
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
