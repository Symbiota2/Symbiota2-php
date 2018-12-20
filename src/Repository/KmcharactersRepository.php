<?php

namespace App\Repository;

use App\Entity\Kmcharacters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmcharacters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmcharacters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmcharacters[]    findAll()
 * @method Kmcharacters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmcharactersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmcharacters::class);
    }

    // /**
    //  * @return Kmcharacters[] Returns an array of Kmcharacters objects
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
    public function findOneBySomeField($value): ?Kmcharacters
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
