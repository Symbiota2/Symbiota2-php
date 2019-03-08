<?php

namespace App\Repository;

use App\Entity\TraitStates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TraitStates|null find($id, $lockMode = null, $lockVersion = null)
 * @method TraitStates|null findOneBy(array $criteria, array $orderBy = null)
 * @method TraitStates[]    findAll()
 * @method TraitStates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraitStatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TraitStates::class);
    }

    // /**
    //  * @return TraitStates[] Returns an array of TraitStates objects
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
    public function findOneBySomeField($value): ?TraitStates
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
