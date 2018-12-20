<?php

namespace App\Repository;

use App\Entity\Referenceauthors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Referenceauthors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referenceauthors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referenceauthors[]    findAll()
 * @method Referenceauthors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceauthorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Referenceauthors::class);
    }

    // /**
    //  * @return Referenceauthors[] Returns an array of Referenceauthors objects
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
    public function findOneBySomeField($value): ?Referenceauthors
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
