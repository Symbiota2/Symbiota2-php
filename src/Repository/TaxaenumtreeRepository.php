<?php

namespace App\Repository;

use App\Entity\Taxaenumtree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxaenumtree|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxaenumtree|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxaenumtree[]    findAll()
 * @method Taxaenumtree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaenumtreeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxaenumtree::class);
    }

    // /**
    //  * @return Taxaenumtree[] Returns an array of Taxaenumtree objects
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
    public function findOneBySomeField($value): ?Taxaenumtree
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
