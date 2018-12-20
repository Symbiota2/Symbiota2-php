<?php

namespace App\Repository;

use App\Entity\Omoccurdatasets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurdatasets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurdatasets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurdatasets[]    findAll()
 * @method Omoccurdatasets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurdatasetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurdatasets::class);
    }

    // /**
    //  * @return Omoccurdatasets[] Returns an array of Omoccurdatasets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omoccurdatasets
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
