<?php

namespace App\Repository;

use App\Entity\SchemaVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SchemaVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchemaVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchemaVersion[]    findAll()
 * @method SchemaVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchemaVersionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SchemaVersion::class);
    }

    // /**
    //  * @return SchemaVersion[] Returns an array of SchemaVersion objects
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
    public function findOneBySomeField($value): ?SchemaVersion
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
