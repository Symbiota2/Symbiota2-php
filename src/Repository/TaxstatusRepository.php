<?php

namespace App\Repository;

use App\Entity\Taxstatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxstatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxstatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxstatus[]    findAll()
 * @method Taxstatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxstatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxstatus::class);
    }

    // /**
    //  * @return Taxstatus[] Returns an array of Taxstatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Taxstatus
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
