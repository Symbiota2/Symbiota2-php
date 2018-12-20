<?php

namespace App\Repository;

use App\Entity\Omoccurdeterminations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurdeterminations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurdeterminations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurdeterminations[]    findAll()
 * @method Omoccurdeterminations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurdeterminationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurdeterminations::class);
    }

    // /**
    //  * @return Omoccurdeterminations[] Returns an array of Omoccurdeterminations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omoccurdeterminations
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
