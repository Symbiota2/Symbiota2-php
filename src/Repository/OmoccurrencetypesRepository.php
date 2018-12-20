<?php

namespace App\Repository;

use App\Entity\Omoccurrencetypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurrencetypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurrencetypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurrencetypes[]    findAll()
 * @method Omoccurrencetypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurrencetypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurrencetypes::class);
    }

    // /**
    //  * @return Omoccurrencetypes[] Returns an array of Omoccurrencetypes objects
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
    public function findOneBySomeField($value): ?Omoccurrencetypes
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
