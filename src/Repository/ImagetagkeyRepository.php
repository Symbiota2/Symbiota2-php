<?php

namespace App\Repository;

use App\Entity\Imagetagkey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imagetagkey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imagetagkey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imagetagkey[]    findAll()
 * @method Imagetagkey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagetagkeyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imagetagkey::class);
    }

    // /**
    //  * @return Imagetagkey[] Returns an array of Imagetagkey objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imagetagkey
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
