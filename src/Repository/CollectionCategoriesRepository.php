<?php

namespace App\Repository;

use App\Entity\CollectionCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CollectionCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectionCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectionCategories[]    findAll()
 * @method CollectionCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CollectionCategories::class);
    }

    // /**
    //  * @return CollectionCategories[] Returns an array of CollectionCategories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CollectionCategories
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
