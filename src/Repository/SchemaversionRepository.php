<?php

namespace App\Repository;

use App\Entity\Schemaversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Schemaversion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schemaversion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schemaversion[]    findAll()
 * @method Schemaversion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchemaversionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Schemaversion::class);
    }

    // /**
    //  * @return Schemaversion[] Returns an array of Schemaversion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Schemaversion
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
