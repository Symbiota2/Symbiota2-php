<?php

namespace App\Repository;

use App\Entity\Imagetag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imagetag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imagetag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imagetag[]    findAll()
 * @method Imagetag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagetagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imagetag::class);
    }

    // /**
    //  * @return Imagetag[] Returns an array of Imagetag objects
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
    public function findOneBySomeField($value): ?Imagetag
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
