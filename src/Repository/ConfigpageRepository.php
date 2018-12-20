<?php

namespace App\Repository;

use App\Entity\Configpage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Configpage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Configpage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Configpage[]    findAll()
 * @method Configpage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigpageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Configpage::class);
    }

    // /**
    //  * @return Configpage[] Returns an array of Configpage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Configpage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
