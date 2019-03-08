<?php

namespace App\Repository;

use App\Entity\TraitDependencies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TraitDependencies|null find($id, $lockMode = null, $lockVersion = null)
 * @method TraitDependencies|null findOneBy(array $criteria, array $orderBy = null)
 * @method TraitDependencies[]    findAll()
 * @method TraitDependencies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraitDependenciesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TraitDependencies::class);
    }

    // /**
    //  * @return TraitDependencies[] Returns an array of TraitDependencies objects
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
    public function findOneBySomeField($value): ?TraitDependencies
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
