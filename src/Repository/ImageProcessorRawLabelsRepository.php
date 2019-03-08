<?php

namespace App\Repository;

use App\Entity\ImageProcessorRawLabels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorRawLabels|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorRawLabels|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorRawLabels[]    findAll()
 * @method ImageProcessorRawLabels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorRawLabelsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorRawLabels::class);
    }

    // /**
    //  * @return ImageProcessorRawLabels[] Returns an array of ImageProcessorRawLabels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageProcessorRawLabels
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
