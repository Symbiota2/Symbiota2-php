<?php

namespace App\Repository;

use App\Entity\LookupCountries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupCountries|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupCountries|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupCountries[]    findAll()
 * @method LookupCountries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupCountriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupCountries::class);
    }

    // /**
    //  * @return LookupCountries[] Returns an array of LookupCountries objects
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
    public function findOneBySomeField($value): ?LookupCountries
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
