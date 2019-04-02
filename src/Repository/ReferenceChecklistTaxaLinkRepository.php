<?php

namespace App\Repository;

use Reference\Entity\ReferenceChecklistTaxaLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReferenceChecklistTaxaLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferenceChecklistTaxaLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferenceChecklistTaxaLink[]    findAll()
 * @method ReferenceChecklistTaxaLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceChecklistTaxaLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReferenceChecklistTaxaLink::class);
    }

    // /**
    //  * @return ReferenceChecklistTaxaLink[] Returns an array of ReferenceChecklistTaxaLink objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReferenceChecklistTaxaLink
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
