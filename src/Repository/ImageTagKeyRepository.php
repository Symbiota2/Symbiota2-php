<?php

namespace App\Repository;

use App\Entity\ImageTagKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageTagKey|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageTagKey|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageTagKey[]    findAll()
 * @method ImageTagKey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageTagKeyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageTagKey::class);
    }

    // /**
    //  * @return ImageTagKey[] Returns an array of ImageTagKey objects
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
    public function findOneBySomeField($value): ?ImageTagKey
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
