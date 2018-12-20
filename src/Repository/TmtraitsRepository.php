<?php

namespace App\Repository;

use App\Entity\Tmtraits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tmtraits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tmtraits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tmtraits[]    findAll()
 * @method Tmtraits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TmtraitsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tmtraits::class);
    }

    // /**
    //  * @return Tmtraits[] Returns an array of Tmtraits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tmtraits
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
