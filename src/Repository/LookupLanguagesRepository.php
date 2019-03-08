<?php

namespace App\Repository;

use App\Entity\LookupLanguages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LookupLanguages|null find($id, $lockMode = null, $lockVersion = null)
 * @method LookupLanguages|null findOneBy(array $criteria, array $orderBy = null)
 * @method LookupLanguages[]    findAll()
 * @method LookupLanguages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LookupLanguagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LookupLanguages::class);
    }

    // /**
    //  * @return LookupLanguages[] Returns an array of LookupLanguages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LookupLanguages
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
