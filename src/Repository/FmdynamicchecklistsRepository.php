<?php

namespace App\Repository;

use App\Entity\Fmdynamicchecklists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmdynamicchecklists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmdynamicchecklists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmdynamicchecklists[]    findAll()
 * @method Fmdynamicchecklists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmdynamicchecklistsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmdynamicchecklists::class);
    }

    // /**
    //  * @return Fmdynamicchecklists[] Returns an array of Fmdynamicchecklists objects
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
    public function findOneBySomeField($value): ?Fmdynamicchecklists
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
