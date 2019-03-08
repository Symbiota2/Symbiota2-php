<?php

namespace App\Repository;

use App\Entity\ChecklistProjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistProjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistProjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistProjects[]    findAll()
 * @method ChecklistProjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistProjectsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistProjects::class);
    }

    // /**
    //  * @return ChecklistProjects[] Returns an array of ChecklistProjects objects
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
    public function findOneBySomeField($value): ?ChecklistProjects
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
