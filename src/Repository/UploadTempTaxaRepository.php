<?php

namespace App\Repository;

use App\Entity\UploadTempTaxa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UploadTempTaxa|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadTempTaxa|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadTempTaxa[]    findAll()
 * @method UploadTempTaxa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadTempTaxaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UploadTempTaxa::class);
    }

    // /**
    //  * @return UploadTempTaxa[] Returns an array of UploadTempTaxa objects
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
    public function findOneBySomeField($value): ?UploadTempTaxa
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
