<?php

namespace App\Repository;

use App\Entity\KeyCharacterStateLanguages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterStateLanguages|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterStateLanguages|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterStateLanguages[]    findAll()
 * @method KeyCharacterStateLanguages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterStateLanguagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterStateLanguages::class);
    }

    // /**
    //  * @return KeyCharacterStateLanguages[] Returns an array of KeyCharacterStateLanguages objects
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
    public function findOneBySomeField($value): ?KeyCharacterStateLanguages
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
