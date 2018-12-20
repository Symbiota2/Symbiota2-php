<?php

namespace App\Repository;

use App\Entity\Omoccurrencesfulltext;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurrencesfulltext|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurrencesfulltext|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurrencesfulltext[]    findAll()
 * @method Omoccurrencesfulltext[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurrencesfulltextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurrencesfulltext::class);
    }

    // /**
    //  * @return Omoccurrencesfulltext[] Returns an array of Omoccurrencesfulltext objects
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
    public function findOneBySomeField($value): ?Omoccurrencesfulltext
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
