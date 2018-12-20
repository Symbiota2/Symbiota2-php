<?php

namespace App\Repository;

use App\Entity\Specprocnlpversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocnlpversion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocnlpversion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocnlpversion[]    findAll()
 * @method Specprocnlpversion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocnlpversionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocnlpversion::class);
    }

    // /**
    //  * @return Specprocnlpversion[] Returns an array of Specprocnlpversion objects
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
    public function findOneBySomeField($value): ?Specprocnlpversion
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
