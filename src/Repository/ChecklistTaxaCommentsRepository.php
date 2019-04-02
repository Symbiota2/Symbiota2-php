<?php

namespace App\Repository;

use Checklist\Entity\ChecklistTaxaComments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChecklistTaxaComments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChecklistTaxaComments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChecklistTaxaComments[]    findAll()
 * @method ChecklistTaxaComments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistTaxaCommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChecklistTaxaComments::class);
    }

    // /**
    //  * @return ChecklistTaxaComments[] Returns an array of ChecklistTaxaComments objects
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
    public function findOneBySomeField($value): ?ChecklistTaxaComments
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
