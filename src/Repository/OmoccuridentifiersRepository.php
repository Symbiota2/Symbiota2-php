<?php

namespace App\Repository;

use App\Entity\Omoccuridentifiers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccuridentifiers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccuridentifiers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccuridentifiers[]    findAll()
 * @method Omoccuridentifiers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccuridentifiersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccuridentifiers::class);
    }

    // /**
    //  * @return Omoccuridentifiers[] Returns an array of Omoccuridentifiers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omoccuridentifiers
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
