<?php

namespace App\Repository;

use App\Entity\Userroles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Userroles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userroles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userroles[]    findAll()
 * @method Userroles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserrolesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Userroles::class);
    }

    // /**
    //  * @return Userroles[] Returns an array of Userroles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userroles
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
