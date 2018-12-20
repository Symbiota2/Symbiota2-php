<?php

namespace App\Repository;

use App\Entity\Omoccuraccessstats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccuraccessstats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccuraccessstats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccuraccessstats[]    findAll()
 * @method Omoccuraccessstats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccuraccessstatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccuraccessstats::class);
    }

    // /**
    //  * @return Omoccuraccessstats[] Returns an array of Omoccuraccessstats objects
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
    public function findOneBySomeField($value): ?Omoccuraccessstats
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
