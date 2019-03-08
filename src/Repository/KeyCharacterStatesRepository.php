<?php

namespace App\Repository;

use App\Entity\KeyCharacterStates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacterStates|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacterStates|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacterStates[]    findAll()
 * @method KeyCharacterStates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharacterStatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacterStates::class);
    }

    // /**
    //  * @return KeyCharacterStates[] Returns an array of KeyCharacterStates objects
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
    public function findOneBySomeField($value): ?KeyCharacterStates
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
