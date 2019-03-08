<?php

namespace App\Repository;

use App\Entity\GuidDeterminations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GuidDeterminations|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuidDeterminations|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuidDeterminations[]    findAll()
 * @method GuidDeterminations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuidDeterminationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GuidDeterminations::class);
    }

    // /**
    //  * @return GuidDeterminations[] Returns an array of GuidDeterminations objects
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
    public function findOneBySomeField($value): ?GuidDeterminations
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
