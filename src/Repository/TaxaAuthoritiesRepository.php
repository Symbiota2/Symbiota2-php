<?php

namespace App\Repository;

use App\Entity\TaxaAuthorities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaAuthorities|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaAuthorities|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaAuthorities[]    findAll()
 * @method TaxaAuthorities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaAuthoritiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaAuthorities::class);
    }

    // /**
    //  * @return TaxaAuthorities[] Returns an array of TaxaAuthorities objects
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
    public function findOneBySomeField($value): ?TaxaAuthorities
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
