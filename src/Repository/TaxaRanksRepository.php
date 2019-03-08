<?php

namespace App\Repository;

use App\Entity\TaxaRanks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaRanks|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaRanks|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaRanks[]    findAll()
 * @method TaxaRanks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaRanksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaRanks::class);
    }

    // /**
    //  * @return TaxaRanks[] Returns an array of TaxaRanks objects
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
    public function findOneBySomeField($value): ?TaxaRanks
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
