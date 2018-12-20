<?php

namespace App\Repository;

use App\Entity\Omcrowdsourcecentral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcrowdsourcecentral|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcrowdsourcecentral|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcrowdsourcecentral[]    findAll()
 * @method Omcrowdsourcecentral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcrowdsourcecentralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcrowdsourcecentral::class);
    }

    // /**
    //  * @return Omcrowdsourcecentral[] Returns an array of Omcrowdsourcecentral objects
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
    public function findOneBySomeField($value): ?Omcrowdsourcecentral
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
