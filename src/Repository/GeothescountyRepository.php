<?php

namespace App\Repository;

use App\Entity\Geothescounty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geothescounty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geothescounty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geothescounty[]    findAll()
 * @method Geothescounty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeothescountyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geothescounty::class);
    }

    // /**
    //  * @return Geothescounty[] Returns an array of Geothescounty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geothescounty
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
