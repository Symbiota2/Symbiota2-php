<?php

namespace App\Repository;

use App\Entity\Taxalinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxalinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxalinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxalinks[]    findAll()
 * @method Taxalinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxalinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxalinks::class);
    }

    // /**
    //  * @return Taxalinks[] Returns an array of Taxalinks objects
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
    public function findOneBySomeField($value): ?Taxalinks
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
