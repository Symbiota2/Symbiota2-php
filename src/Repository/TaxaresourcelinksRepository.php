<?php

namespace App\Repository;

use App\Entity\Taxaresourcelinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxaresourcelinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxaresourcelinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxaresourcelinks[]    findAll()
 * @method Taxaresourcelinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaresourcelinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxaresourcelinks::class);
    }

    // /**
    //  * @return Taxaresourcelinks[] Returns an array of Taxaresourcelinks objects
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
    public function findOneBySomeField($value): ?Taxaresourcelinks
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
