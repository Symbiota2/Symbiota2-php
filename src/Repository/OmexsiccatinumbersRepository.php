<?php

namespace App\Repository;

use App\Entity\Omexsiccatinumbers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omexsiccatinumbers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omexsiccatinumbers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omexsiccatinumbers[]    findAll()
 * @method Omexsiccatinumbers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmexsiccatinumbersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omexsiccatinumbers::class);
    }

    // /**
    //  * @return Omexsiccatinumbers[] Returns an array of Omexsiccatinumbers objects
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
    public function findOneBySomeField($value): ?Omexsiccatinumbers
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
