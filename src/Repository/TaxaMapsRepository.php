<?php

namespace App\Repository;

use App\Entity\TaxaMaps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaMaps|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaMaps|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaMaps[]    findAll()
 * @method TaxaMaps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaMapsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaMaps::class);
    }

    // /**
    //  * @return TaxaMaps[] Returns an array of TaxaMaps objects
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
    public function findOneBySomeField($value): ?TaxaMaps
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
