<?php

namespace App\Repository;

use App\Entity\UploadTempDeterminations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadTempDeterminations|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadTempDeterminations|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadTempDeterminations[]    findAll()
 * @method UploadTempDeterminations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadTempDeterminationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadTempDeterminations::class);
    }

    // /**
    //  * @return UploadTempDeterminations[] Returns an array of UploadTempDeterminations objects
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
    public function findOneBySomeField($value): ?UploadTempDeterminations
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
