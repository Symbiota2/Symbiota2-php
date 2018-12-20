<?php

namespace App\Repository;

use App\Entity\Omexsiccatititles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omexsiccatititles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omexsiccatititles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omexsiccatititles[]    findAll()
 * @method Omexsiccatititles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmexsiccatititlesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omexsiccatititles::class);
    }

    // /**
    //  * @return Omexsiccatititles[] Returns an array of Omexsiccatititles objects
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
    public function findOneBySomeField($value): ?Omexsiccatititles
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
