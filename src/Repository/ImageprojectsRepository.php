<?php

namespace App\Repository;

use App\Entity\Imageprojects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imageprojects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageprojects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageprojects[]    findAll()
 * @method Imageprojects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageprojectsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imageprojects::class);
    }

    // /**
    //  * @return Imageprojects[] Returns an array of Imageprojects objects
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
    public function findOneBySomeField($value): ?Imageprojects
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
