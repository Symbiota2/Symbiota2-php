<?php

namespace App\Repository;

use App\Entity\Tmtraitdependencies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tmtraitdependencies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tmtraitdependencies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tmtraitdependencies[]    findAll()
 * @method Tmtraitdependencies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TmtraitdependenciesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tmtraitdependencies::class);
    }

    // /**
    //  * @return Tmtraitdependencies[] Returns an array of Tmtraitdependencies objects
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
    public function findOneBySomeField($value): ?Tmtraitdependencies
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
