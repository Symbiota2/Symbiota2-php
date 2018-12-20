<?php

namespace App\Repository;

use App\Entity\Taxaprofilepubs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Taxaprofilepubs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taxaprofilepubs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taxaprofilepubs[]    findAll()
 * @method Taxaprofilepubs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaprofilepubsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taxaprofilepubs::class);
    }

    // /**
    //  * @return Taxaprofilepubs[] Returns an array of Taxaprofilepubs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Taxaprofilepubs
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
