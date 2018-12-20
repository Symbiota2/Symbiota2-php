<?php

namespace App\Repository;

use App\Entity\Taxa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxa[]    findAll()
 * @method Taxa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxa::class);
    }

    // /**
    //  * @return Taxa[] Returns an array of Taxa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Taxa
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
