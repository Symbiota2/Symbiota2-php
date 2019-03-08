<?php

namespace App\Repository;

use App\Entity\GlossaryImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GlossaryImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlossaryImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlossaryImages[]    findAll()
 * @method GlossaryImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GlossaryImages::class);
    }

    // /**
    //  * @return GlossaryImages[] Returns an array of GlossaryImages objects
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
    public function findOneBySomeField($value): ?GlossaryImages
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
