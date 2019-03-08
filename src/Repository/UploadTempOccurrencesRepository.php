<?php

namespace App\Repository;

use App\Entity\UploadTempOccurrences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadTempOccurrences|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadTempOccurrences|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadTempOccurrences[]    findAll()
 * @method UploadTempOccurrences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadTempOccurrencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadTempOccurrences::class);
    }

    // /**
    //  * @return UploadTempOccurrences[] Returns an array of UploadTempOccurrences objects
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
    public function findOneBySomeField($value): ?UploadTempOccurrences
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
