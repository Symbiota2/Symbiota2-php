<?php

namespace App\Repository;

use App\Entity\Uploadtaxa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadtaxa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadtaxa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadtaxa[]    findAll()
 * @method Uploadtaxa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadtaxaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadtaxa::class);
    }

    // /**
    //  * @return Uploadtaxa[] Returns an array of Uploadtaxa objects
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
    public function findOneBySomeField($value): ?Uploadtaxa
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
