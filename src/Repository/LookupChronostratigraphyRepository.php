<?php

namespace App\Repository;

use App\Entity\LookupChronostratigraphy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupChronostratigraphy|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupChronostratigraphy|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupChronostratigraphy[]    findAll()
 * @method LookupChronostratigraphy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupChronostratigraphyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupChronostratigraphy::class);
    }

    // /**
    //  * @return LookupChronostratigraphy[] Returns an array of LookupChronostratigraphy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LookupChronostratigraphy
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
