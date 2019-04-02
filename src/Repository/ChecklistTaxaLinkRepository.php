<?php

namespace App\Repository;

use Checklist\Entity\ChecklistTaxaLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistTaxaLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistTaxaLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistTaxaLink[]    findAll()
 * @method ChecklistTaxaLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistTaxaLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistTaxaLink::class);
    }

    // /**
    //  * @return ChecklistTaxaLink[] Returns an array of ChecklistTaxaLink objects
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
    public function findOneBySomeField($value): ?ChecklistTaxaLink
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
