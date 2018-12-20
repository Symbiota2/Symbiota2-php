<?php

namespace App\Repository;

use App\Entity\Omoccurassociations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurassociations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurassociations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurassociations[]    findAll()
 * @method Omoccurassociations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurassociationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurassociations::class);
    }

    // /**
    //  * @return Omoccurassociations[] Returns an array of Omoccurassociations objects
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
    public function findOneBySomeField($value): ?Omoccurassociations
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
