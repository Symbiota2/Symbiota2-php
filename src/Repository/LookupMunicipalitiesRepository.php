<?php

namespace App\Repository;

use App\Entity\LookupMunicipalities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupMunicipalities|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupMunicipalities|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupMunicipalities[]    findAll()
 * @method LookupMunicipalities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupMunicipalitiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupMunicipalities::class);
    }

    // /**
    //  * @return LookupMunicipalities[] Returns an array of LookupMunicipalities objects
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
    public function findOneBySomeField($value): ?LookupMunicipalities
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
