<?php

namespace App\Repository;

use App\Entity\Specprocessorprojects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocessorprojects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocessorprojects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocessorprojects[]    findAll()
 * @method Specprocessorprojects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocessorprojectsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocessorprojects::class);
    }

    // /**
    //  * @return Specprocessorprojects[] Returns an array of Specprocessorprojects objects
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
    public function findOneBySomeField($value): ?Specprocessorprojects
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
