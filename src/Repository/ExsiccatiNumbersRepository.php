<?php

namespace App\Repository;

use App\Entity\ExsiccatiNumbers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExsiccatiNumbers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExsiccatiNumbers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExsiccatiNumbers[]    findAll()
 * @method ExsiccatiNumbers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExsiccatiNumbersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExsiccatiNumbers::class);
    }

    // /**
    //  * @return ExsiccatiNumbers[] Returns an array of ExsiccatiNumbers objects
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
    public function findOneBySomeField($value): ?ExsiccatiNumbers
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
