<?php

namespace App\Repository;

use App\Entity\Omoccurrences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurrences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurrences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurrences[]    findAll()
 * @method Omoccurrences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurrencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurrences::class);
    }

    // /**
    //  * @return Omoccurrences[] Returns an array of Omoccurrences objects
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
    public function findOneBySomeField($value): ?Omoccurrences
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
