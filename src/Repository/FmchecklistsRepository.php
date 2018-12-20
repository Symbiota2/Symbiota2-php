<?php

namespace App\Repository;

use App\Entity\Fmchecklists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmchecklists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmchecklists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmchecklists[]    findAll()
 * @method Fmchecklists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmchecklistsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmchecklists::class);
    }

    // /**
    //  * @return Fmchecklists[] Returns an array of Fmchecklists objects
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
    public function findOneBySomeField($value): ?Fmchecklists
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
