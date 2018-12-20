<?php

namespace App\Repository;

use App\Entity\Taxadescrblock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxadescrblock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxadescrblock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxadescrblock[]    findAll()
 * @method Taxadescrblock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxadescrblockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxadescrblock::class);
    }

    // /**
    //  * @return Taxadescrblock[] Returns an array of Taxadescrblock objects
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
    public function findOneBySomeField($value): ?Taxadescrblock
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
