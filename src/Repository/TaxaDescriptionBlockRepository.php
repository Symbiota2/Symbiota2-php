<?php

namespace App\Repository;

use App\Entity\TaxaDescriptionBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxaDescriptionBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxaDescriptionBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxaDescriptionBlock[]    findAll()
 * @method TaxaDescriptionBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxaDescriptionBlockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxaDescriptionBlock::class);
    }

    // /**
    //  * @return TaxaDescriptionBlock[] Returns an array of TaxaDescriptionBlock objects
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
    public function findOneBySomeField($value): ?TaxaDescriptionBlock
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
