<?php

namespace App\Repository;

use App\Entity\Omoccureditlocks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccureditlocks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccureditlocks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccureditlocks[]    findAll()
 * @method Omoccureditlocks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccureditlocksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccureditlocks::class);
    }

    // /**
    //  * @return Omoccureditlocks[] Returns an array of Omoccureditlocks objects
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
    public function findOneBySomeField($value): ?Omoccureditlocks
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
