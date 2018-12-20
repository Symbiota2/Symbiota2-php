<?php

namespace App\Repository;

use App\Entity\Specprocnlp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocnlp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocnlp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocnlp[]    findAll()
 * @method Specprocnlp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocnlpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocnlp::class);
    }

    // /**
    //  * @return Specprocnlp[] Returns an array of Specprocnlp objects
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
    public function findOneBySomeField($value): ?Specprocnlp
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
