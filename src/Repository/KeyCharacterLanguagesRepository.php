<?php

namespace App\Repository;

use App\Entity\KeyCharacterLanguages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterLanguages|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterLanguages|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterLanguages[]    findAll()
 * @method KeyCharacterLanguages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterLanguagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterLanguages::class);
    }

    // /**
    //  * @return KeyCharacterLanguages[] Returns an array of KeyCharacterLanguages objects
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
    public function findOneBySomeField($value): ?KeyCharacterLanguages
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
