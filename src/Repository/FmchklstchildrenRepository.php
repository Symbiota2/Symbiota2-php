<?php

namespace App\Repository;

use App\Entity\Fmchklstchildren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmchklstchildren|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmchklstchildren|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmchklstchildren[]    findAll()
 * @method Fmchklstchildren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmchklstchildrenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmchklstchildren::class);
    }

    // /**
    //  * @return Fmchklstchildren[] Returns an array of Fmchklstchildren objects
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
    public function findOneBySomeField($value): ?Fmchklstchildren
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
