<?php

namespace App\Repository;

use App\Entity\TraitAttributes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TraitAttributes|null find($id, $lockMode = null, $lockVersion = null)
 * @method TraitAttributes|null findOneBy(array $criteria, array $orderBy = null)
 * @method TraitAttributes[]    findAll()
 * @method TraitAttributes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraitAttributesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TraitAttributes::class);
    }

    // /**
    //  * @return TraitAttributes[] Returns an array of TraitAttributes objects
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
    public function findOneBySomeField($value): ?TraitAttributes
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
