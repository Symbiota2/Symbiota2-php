<?php

namespace App\Repository;

use App\Entity\OccurrenceGenetic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceGenetic|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceGenetic|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceGenetic[]    findAll()
 * @method OccurrenceGenetic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceGeneticRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceGenetic::class);
    }

    // /**
    //  * @return OccurrenceGenetic[] Returns an array of OccurrenceGenetic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OccurrenceGenetic
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
