<?php

namespace App\Repository;

use App\Entity\UploadTempImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadTempImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadTempImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadTempImages[]    findAll()
 * @method UploadTempImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadTempImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadTempImages::class);
    }

    // /**
    //  * @return UploadTempImages[] Returns an array of UploadTempImages objects
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
    public function findOneBySomeField($value): ?UploadTempImages
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
