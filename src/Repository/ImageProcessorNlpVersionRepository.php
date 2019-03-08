<?php

namespace App\Repository;

use App\Entity\ImageProcessorNlpVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorNlpVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorNlpVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorNlpVersion[]    findAll()
 * @method ImageProcessorNlpVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorNlpVersionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorNlpVersion::class);
    }

    // /**
    //  * @return ImageProcessorNlpVersion[] Returns an array of ImageProcessorNlpVersion objects
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
    public function findOneBySomeField($value): ?ImageProcessorNlpVersion
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
