<?php

namespace App\Repository;

use App\Entity\ChecklistProjectCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistProjectCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistProjectCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistProjectCategories[]    findAll()
 * @method ChecklistProjectCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistProjectCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistProjectCategories::class);
    }

    // /**
    //  * @return ChecklistProjectCategories[] Returns an array of ChecklistProjectCategories objects
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
    public function findOneBySomeField($value): ?ChecklistProjectCategories
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
