<?php

namespace App\Repository;

use App\Entity\Kmcslang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kmcslang|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kmcslang|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kmcslang[]    findAll()
 * @method Kmcslang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KmcslangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kmcslang::class);
    }

    // /**
    //  * @return Kmcslang[] Returns an array of Kmcslang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kmcslang
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
