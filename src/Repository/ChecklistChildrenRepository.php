<?php

namespace App\Repository;

use App\Entity\ChecklistChildren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistChildren|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistChildren|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistChildren[]    findAll()
 * @method ChecklistChildren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistChildrenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistChildren::class);
    }

    // /**
    //  * @return ChecklistChildren[] Returns an array of ChecklistChildren objects
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
    public function findOneBySomeField($value): ?ChecklistChildren
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
