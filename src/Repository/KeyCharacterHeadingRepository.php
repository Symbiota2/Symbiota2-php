<?php

namespace App\Repository;

use App\Entity\KeyCharacterHeading;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterHeading|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterHeading|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterHeading[]    findAll()
 * @method KeyCharacterHeading[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterHeadingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterHeading::class);
    }

    // /**
    //  * @return KeyCharacterHeading[] Returns an array of KeyCharacterHeading objects
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
    public function findOneBySomeField($value): ?KeyCharacterHeading
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
