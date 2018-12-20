<?php

namespace App\Repository;

use App\Entity\Referenceobject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Referenceobject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referenceobject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referenceobject[]    findAll()
 * @method Referenceobject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceobjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Referenceobject::class);
    }

    // /**
    //  * @return Referenceobject[] Returns an array of Referenceobject objects
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
    public function findOneBySomeField($value): ?Referenceobject
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
