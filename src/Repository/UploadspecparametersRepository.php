<?php

namespace App\Repository;

use App\Entity\Uploadspecparameters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadspecparameters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadspecparameters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadspecparameters[]    findAll()
 * @method Uploadspecparameters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadspecparametersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadspecparameters::class);
    }

    // /**
    //  * @return Uploadspecparameters[] Returns an array of Uploadspecparameters objects
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
    public function findOneBySomeField($value): ?Uploadspecparameters
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
