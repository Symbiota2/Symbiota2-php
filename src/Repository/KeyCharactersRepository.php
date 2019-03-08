<?php

namespace App\Repository;

use App\Entity\KeyCharacters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyCharacters|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyCharacters|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyCharacters[]    findAll()
 * @method KeyCharacters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyCharactersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyCharacters::class);
    }

    // /**
    //  * @return KeyCharacters[] Returns an array of KeyCharacters objects
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
    public function findOneBySomeField($value): ?KeyCharacters
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
