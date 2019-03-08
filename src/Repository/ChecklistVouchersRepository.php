<?php

namespace App\Repository;

use App\Entity\ChecklistVouchers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistVouchers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistVouchers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistVouchers[]    findAll()
 * @method ChecklistVouchers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistVouchersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistVouchers::class);
    }

    // /**
    //  * @return ChecklistVouchers[] Returns an array of ChecklistVouchers objects
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
    public function findOneBySomeField($value): ?ChecklistVouchers
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
