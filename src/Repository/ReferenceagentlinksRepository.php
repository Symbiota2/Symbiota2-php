<?php

namespace App\Repository;

use App\Entity\Referenceagentlinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Referenceagentlinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referenceagentlinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referenceagentlinks[]    findAll()
 * @method Referenceagentlinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceagentlinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Referenceagentlinks::class);
    }

    // /**
    //  * @return Referenceagentlinks[] Returns an array of Referenceagentlinks objects
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
    public function findOneBySomeField($value): ?Referenceagentlinks
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
