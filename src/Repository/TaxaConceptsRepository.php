<?php

namespace App\Repository;

use App\Entity\TaxaConcepts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaConcepts|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaConcepts|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaConcepts[]    findAll()
 * @method TaxaConcepts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaConceptsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaConcepts::class);
    }

    // /**
    //  * @return TaxaConcepts[] Returns an array of TaxaConcepts objects
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
    public function findOneBySomeField($value): ?TaxaConcepts
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
