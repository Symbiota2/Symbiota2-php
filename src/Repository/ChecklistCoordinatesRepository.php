<?php

namespace App\Repository;

use App\Entity\ChecklistCoordinates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistCoordinates|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistCoordinates|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistCoordinates[]    findAll()
 * @method ChecklistCoordinates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistCoordinatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistCoordinates::class);
    }

    // /**
    //  * @return ChecklistCoordinates[] Returns an array of ChecklistCoordinates objects
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
    public function findOneBySomeField($value): ?ChecklistCoordinates
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
