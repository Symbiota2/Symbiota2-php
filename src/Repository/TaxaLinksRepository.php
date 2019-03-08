<?php

namespace App\Repository;

use App\Entity\TaxaLinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaLinks[]    findAll()
 * @method TaxaLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaLinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaLinks::class);
    }

    // /**
    //  * @return TaxaLinks[] Returns an array of TaxaLinks objects
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
    public function findOneBySomeField($value): ?TaxaLinks
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
