<?php

namespace App\Repository;

use App\Entity\Fmprojectcategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmprojectcategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmprojectcategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmprojectcategories[]    findAll()
 * @method Fmprojectcategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmprojectcategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmprojectcategories::class);
    }

    // /**
    //  * @return Fmprojectcategories[] Returns an array of Fmprojectcategories objects
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
    public function findOneBySomeField($value): ?Fmprojectcategories
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
