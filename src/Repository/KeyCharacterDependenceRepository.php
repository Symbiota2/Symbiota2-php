<?php

namespace App\Repository;

use App\Entity\KeyCharacterDependence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterDependence|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterDependence|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterDependence[]    findAll()
 * @method KeyCharacterDependence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterDependenceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterDependence::class);
    }

    // /**
    //  * @return KeyCharacterDependence[] Returns an array of KeyCharacterDependence objects
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
    public function findOneBySomeField($value): ?KeyCharacterDependence
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
