<?php

namespace App\Repository;

use App\Entity\GuidOccurrences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GuidOccurrences|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuidOccurrences|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuidOccurrences[]    findAll()
 * @method GuidOccurrences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidOccurrencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GuidOccurrences::class);
    }

    // /**
    //  * @return GuidOccurrences[] Returns an array of GuidOccurrences objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuidOccurrences
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
