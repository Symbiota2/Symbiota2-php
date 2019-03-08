<?php

namespace App\Repository;

use App\Entity\TaxaDescriptionStatements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaDescriptionStatements|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaDescriptionStatements|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaDescriptionStatements[]    findAll()
 * @method TaxaDescriptionStatements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaDescriptionStatementsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaDescriptionStatements::class);
    }

    // /**
    //  * @return TaxaDescriptionStatements[] Returns an array of TaxaDescriptionStatements objects
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
    public function findOneBySomeField($value): ?TaxaDescriptionStatements
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
