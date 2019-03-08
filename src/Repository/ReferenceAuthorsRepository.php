<?php

namespace App\Repository;

use App\Entity\ReferenceAuthors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReferenceAuthors|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferenceAuthors|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferenceAuthors[]    findAll()
 * @method ReferenceAuthors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceAuthorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReferenceAuthors::class);
    }

    // /**
    //  * @return ReferenceAuthors[] Returns an array of ReferenceAuthors objects
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
    public function findOneBySomeField($value): ?ReferenceAuthors
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
