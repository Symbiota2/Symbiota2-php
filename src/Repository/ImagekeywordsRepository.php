<?php

namespace App\Repository;

use App\Entity\Imagekeywords;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imagekeywords|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imagekeywords|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imagekeywords[]    findAll()
 * @method Imagekeywords[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagekeywordsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imagekeywords::class);
    }

    // /**
    //  * @return Imagekeywords[] Returns an array of Imagekeywords objects
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
    public function findOneBySomeField($value): ?Imagekeywords
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
