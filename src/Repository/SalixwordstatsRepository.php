<?php

namespace App\Repository;

use App\Entity\Salixwordstats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Salixwordstats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salixwordstats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salixwordstats[]    findAll()
 * @method Salixwordstats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalixwordstatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Salixwordstats::class);
    }

    // /**
    //  * @return Salixwordstats[] Returns an array of Salixwordstats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Salixwordstats
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
