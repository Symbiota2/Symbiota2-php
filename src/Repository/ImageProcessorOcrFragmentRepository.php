<?php

namespace App\Repository;

use App\Entity\ImageProcessorOcrFragment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProcessorOcrFragment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcessorOcrFragment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcessorOcrFragment[]    findAll()
 * @method ImageProcessorOcrFragment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessorOcrFragmentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProcessorOcrFragment::class);
    }

    // /**
    //  * @return ImageProcessorOcrFragment[] Returns an array of ImageProcessorOcrFragment objects
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
    public function findOneBySomeField($value): ?ImageProcessorOcrFragment
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
