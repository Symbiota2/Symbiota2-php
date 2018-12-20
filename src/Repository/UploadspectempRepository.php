<?php

namespace App\Repository;

use App\Entity\Uploadspectemp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadspectemp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadspectemp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadspectemp[]    findAll()
 * @method Uploadspectemp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadspectempRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadspectemp::class);
    }

    // /**
    //  * @return Uploadspectemp[] Returns an array of Uploadspectemp objects
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
    public function findOneBySomeField($value): ?Uploadspectemp
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
