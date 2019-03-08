<?php

namespace App\Repository;

use App\Entity\ImageProcessorNlp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorNlp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorNlp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorNlp[]    findAll()
 * @method ImageProcessorNlp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorNlpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorNlp::class);
    }

    // /**
    //  * @return ImageProcessorNlp[] Returns an array of ImageProcessorNlp objects
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
    public function findOneBySomeField($value): ?ImageProcessorNlp
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
