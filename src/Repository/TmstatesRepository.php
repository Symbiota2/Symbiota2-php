<?php

namespace App\Repository;

use App\Entity\Tmstates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tmstates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tmstates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tmstates[]    findAll()
 * @method Tmstates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TmstatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tmstates::class);
    }

    // /**
    //  * @return Tmstates[] Returns an array of Tmstates objects
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
    public function findOneBySomeField($value): ?Tmstates
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
