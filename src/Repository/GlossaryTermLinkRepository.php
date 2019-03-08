<?php

namespace App\Repository;

use App\Entity\GlossaryTermLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GlossaryTermLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlossaryTermLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlossaryTermLink[]    findAll()
 * @method GlossaryTermLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossaryTermLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GlossaryTermLink::class);
    }

    // /**
    //  * @return GlossaryTermLink[] Returns an array of GlossaryTermLink objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GlossaryTermLink
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
