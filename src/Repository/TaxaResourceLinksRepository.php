<?php

namespace App\Repository;

use App\Entity\TaxaResourceLinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaResourceLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaResourceLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaResourceLinks[]    findAll()
 * @method TaxaResourceLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaResourceLinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaResourceLinks::class);
    }

    // /**
    //  * @return TaxaResourceLinks[] Returns an array of TaxaResourceLinks objects
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
    public function findOneBySomeField($value): ?TaxaResourceLinks
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
