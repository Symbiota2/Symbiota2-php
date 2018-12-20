<?php

namespace App\Repository;

use App\Entity\Fmprojects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fmprojects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fmprojects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fmprojects[]    findAll()
 * @method Fmprojects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FmprojectsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fmprojects::class);
    }

    // /**
    //  * @return Fmprojects[] Returns an array of Fmprojects objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fmprojects
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
