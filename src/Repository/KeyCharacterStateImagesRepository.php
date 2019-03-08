<?php

namespace App\Repository;

use App\Entity\KeyCharacterStateImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterStateImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterStateImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterStateImages[]    findAll()
 * @method KeyCharacterStateImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterStateImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterStateImages::class);
    }

    // /**
    //  * @return KeyCharacterStateImages[] Returns an array of KeyCharacterStateImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KeyCharacterStateImages
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
