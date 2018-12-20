<?php

namespace App\Repository;

use App\Entity\Adminlanguages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Adminlanguages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adminlanguages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adminlanguages[]    findAll()
 * @method Adminlanguages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminlanguagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Adminlanguages::class);
    }

    // /**
    //  * @return Adminlanguages[] Returns an array of Adminlanguages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adminlanguages
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
