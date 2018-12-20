<?php

namespace App\Repository;

use App\Entity\Glossaryimages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glossaryimages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glossaryimages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glossaryimages[]    findAll()
 * @method Glossaryimages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryimagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glossaryimages::class);
    }

    // /**
    //  * @return Glossaryimages[] Returns an array of Glossaryimages objects
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
    public function findOneBySomeField($value): ?Glossaryimages
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
