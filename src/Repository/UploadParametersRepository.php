<?php

namespace App\Repository;

use App\Entity\UploadParameters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadParameters|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadParameters|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadParameters[]    findAll()
 * @method UploadParameters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadParametersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadParameters::class);
    }

    // /**
    //  * @return UploadParameters[] Returns an array of UploadParameters objects
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
    public function findOneBySomeField($value): ?UploadParameters
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
