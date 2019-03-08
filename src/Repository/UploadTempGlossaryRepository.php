<?php

namespace App\Repository;

use App\Entity\UploadTempGlossary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadTempGlossary|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadTempGlossary|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadTempGlossary[]    findAll()
 * @method UploadTempGlossary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadTempGlossaryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadTempGlossary::class);
    }

    // /**
    //  * @return UploadTempGlossary[] Returns an array of UploadTempGlossary objects
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
    public function findOneBySomeField($value): ?UploadTempGlossary
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
