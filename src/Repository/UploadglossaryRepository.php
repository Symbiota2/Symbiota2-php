<?php

namespace App\Repository;

use App\Entity\Uploadglossary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadglossary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadglossary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadglossary[]    findAll()
 * @method Uploadglossary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadglossaryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadglossary::class);
    }

    // /**
    //  * @return Uploadglossary[] Returns an array of Uploadglossary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uploadglossary
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
