<?php

namespace App\Repository;

use App\Entity\ChecklistsDynamic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistsDynamic|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistsDynamic|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistsDynamic[]    findAll()
 * @method ChecklistsDynamic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistsDynamicRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistsDynamic::class);
    }

    // /**
    //  * @return ChecklistsDynamic[] Returns an array of ChecklistsDynamic objects
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
    public function findOneBySomeField($value): ?ChecklistsDynamic
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
