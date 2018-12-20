<?php

namespace App\Repository;

use App\Entity\Referencechklsttaxalink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Referencechklsttaxalink|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referencechklsttaxalink|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referencechklsttaxalink[]    findAll()
 * @method Referencechklsttaxalink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferencechklsttaxalinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Referencechklsttaxalink::class);
    }

    // /**
    //  * @return Referencechklsttaxalink[] Returns an array of Referencechklsttaxalink objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Referencechklsttaxalink
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
