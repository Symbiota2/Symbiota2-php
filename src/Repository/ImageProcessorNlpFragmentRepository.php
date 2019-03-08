<?php

namespace App\Repository;

use App\Entity\ImageProcessorNlpFragment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorNlpFragment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorNlpFragment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorNlpFragment[]    findAll()
 * @method ImageProcessorNlpFragment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorNlpFragmentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorNlpFragment::class);
    }

    // /**
    //  * @return ImageProcessorNlpFragment[] Returns an array of ImageProcessorNlpFragment objects
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
    public function findOneBySomeField($value): ?ImageProcessorNlpFragment
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
