<?php

namespace App\Repository;

use App\Entity\Occurrences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Occurrences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Occurrences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Occurrences[]    findAll()
 * @method Occurrences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Occurrences::class);
    }

    // /**
    //  * @return Occurrences[] Returns an array of Occurrences objects
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
    public function findOneBySomeField($value): ?Occurrences
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
