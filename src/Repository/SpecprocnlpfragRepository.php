<?php

namespace App\Repository;

use App\Entity\Specprocnlpfrag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Specprocnlpfrag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specprocnlpfrag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specprocnlpfrag[]    findAll()
 * @method Specprocnlpfrag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecprocnlpfragRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Specprocnlpfrag::class);
    }

    // /**
    //  * @return Specprocnlpfrag[] Returns an array of Specprocnlpfrag objects
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
    public function findOneBySomeField($value): ?Specprocnlpfrag
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
