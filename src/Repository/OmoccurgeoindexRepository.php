<?php

namespace App\Repository;

use App\Entity\Omoccurgeoindex;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurgeoindex|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurgeoindex|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurgeoindex[]    findAll()
 * @method Omoccurgeoindex[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurgeoindexRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurgeoindex::class);
    }

    // /**
    //  * @return Omoccurgeoindex[] Returns an array of Omoccurgeoindex objects
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
    public function findOneBySomeField($value): ?Omoccurgeoindex
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
