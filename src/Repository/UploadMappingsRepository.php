<?php

namespace App\Repository;

use App\Entity\UploadMappings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadMappings|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadMappings|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadMappings[]    findAll()
 * @method UploadMappings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadMappingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadMappings::class);
    }

    // /**
    //  * @return UploadMappings[] Returns an array of UploadMappings objects
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
    public function findOneBySomeField($value): ?UploadMappings
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
