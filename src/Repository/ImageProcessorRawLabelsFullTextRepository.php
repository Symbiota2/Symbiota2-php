<?php

namespace App\Repository;

use App\Entity\ImageProcessorRawLabelsFullText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorRawLabelsFullText|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorRawLabelsFullText|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorRawLabelsFullText[]    findAll()
 * @method ImageProcessorRawLabelsFullText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorRawLabelsFullTextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorRawLabelsFullText::class);
    }

    // /**
    //  * @return ImageProcessorRawLabelsFullText[] Returns an array of ImageProcessorRawLabelsFullText objects
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
    public function findOneBySomeField($value): ?ImageProcessorRawLabelsFullText
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
