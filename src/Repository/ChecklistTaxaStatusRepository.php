<?php

namespace App\Repository;

use App\Entity\ChecklistTaxaStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistTaxaStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistTaxaStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistTaxaStatus[]    findAll()
 * @method ChecklistTaxaStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistTaxaStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistTaxaStatus::class);
    }

    // /**
    //  * @return ChecklistTaxaStatus[] Returns an array of ChecklistTaxaStatus objects
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
    public function findOneBySomeField($value): ?ChecklistTaxaStatus
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
