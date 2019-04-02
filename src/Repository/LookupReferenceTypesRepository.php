<?php

namespace App\Repository;

use Reference\Entity\LookupReferenceTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupReferenceTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupReferenceTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupReferenceTypes[]    findAll()
 * @method LookupReferenceTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupReferenceTypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupReferenceTypes::class);
    }

    // /**
    //  * @return LookupReferenceTypes[] Returns an array of LookupReferenceTypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LookupReferenceTypes
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
