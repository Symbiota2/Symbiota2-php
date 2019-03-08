<?php

namespace App\Repository;

use App\Entity\LookupStateProvinces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupStateProvinces|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupStateProvinces|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupStateProvinces[]    findAll()
 * @method LookupStateProvinces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupStateProvincesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupStateProvinces::class);
    }

    // /**
    //  * @return LookupStateProvinces[] Returns an array of LookupStateProvinces objects
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
    public function findOneBySomeField($value): ?LookupStateProvinces
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
