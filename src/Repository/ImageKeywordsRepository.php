<?php

namespace App\Repository;

use App\Entity\ImageKeywords;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageKeywords|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageKeywords|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageKeywords[]    findAll()
 * @method ImageKeywords[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageKeywordsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageKeywords::class);
    }

    // /**
    //  * @return ImageKeywords[] Returns an array of ImageKeywords objects
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
    public function findOneBySomeField($value): ?ImageKeywords
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
