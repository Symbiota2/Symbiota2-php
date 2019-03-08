<?php

namespace App\Repository;

use App\Entity\GuidImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GuidImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuidImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuidImages[]    findAll()
 * @method GuidImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GuidImages::class);
    }

    // /**
    //  * @return GuidImages[] Returns an array of GuidImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuidImages
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
