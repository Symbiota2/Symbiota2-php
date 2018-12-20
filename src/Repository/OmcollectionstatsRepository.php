<?php

namespace App\Repository;

use App\Entity\Omcollectionstats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcollectionstats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcollectionstats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcollectionstats[]    findAll()
 * @method Omcollectionstats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcollectionstatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcollectionstats::class);
    }

    // /**
    //  * @return Omcollectionstats[] Returns an array of Omcollectionstats objects
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
    public function findOneBySomeField($value): ?Omcollectionstats
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
