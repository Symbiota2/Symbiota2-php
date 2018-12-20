<?php

namespace App\Repository;

use App\Entity\Taxonunits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxonunits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxonunits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxonunits[]    findAll()
 * @method Taxonunits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxonunitsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxonunits::class);
    }

    // /**
    //  * @return Taxonunits[] Returns an array of Taxonunits objects
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
    public function findOneBySomeField($value): ?Taxonunits
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
