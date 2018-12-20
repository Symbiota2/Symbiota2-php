<?php

namespace App\Repository;

use App\Entity\Omcollsecondary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcollsecondary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcollsecondary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcollsecondary[]    findAll()
 * @method Omcollsecondary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcollsecondaryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcollsecondary::class);
    }

    // /**
    //  * @return Omcollsecondary[] Returns an array of Omcollsecondary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omcollsecondary
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
