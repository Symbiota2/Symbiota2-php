<?php

namespace App\Repository;

use App\Entity\Glossarysources;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glossarysources|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glossarysources|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glossarysources[]    findAll()
 * @method Glossarysources[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossarysourcesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glossarysources::class);
    }

    // /**
    //  * @return Glossarysources[] Returns an array of Glossarysources objects
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
    public function findOneBySomeField($value): ?Glossarysources
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
