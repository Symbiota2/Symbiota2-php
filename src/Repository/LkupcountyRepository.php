<?php

namespace App\Repository;

use App\Entity\Lkupcounty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lkupcounty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lkupcounty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lkupcounty[]    findAll()
 * @method Lkupcounty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LkupcountyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lkupcounty::class);
    }

    // /**
    //  * @return Lkupcounty[] Returns an array of Lkupcounty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lkupcounty
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
