<?php

namespace App\Repository;

use App\Entity\TaxaRelationships;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaRelationships|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaRelationships|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaRelationships[]    findAll()
 * @method TaxaRelationships[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaRelationshipsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaRelationships::class);
    }

    // /**
    //  * @return TaxaRelationships[] Returns an array of TaxaRelationships objects
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
    public function findOneBySomeField($value): ?TaxaRelationships
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
