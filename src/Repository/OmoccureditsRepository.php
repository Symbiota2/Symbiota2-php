<?php

namespace App\Repository;

use App\Entity\Omoccuredits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccuredits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccuredits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccuredits[]    findAll()
 * @method Omoccuredits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccureditsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccuredits::class);
    }

    // /**
    //  * @return Omoccuredits[] Returns an array of Omoccuredits objects
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
    public function findOneBySomeField($value): ?Omoccuredits
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
