<?php

namespace App\Repository;

use App\Entity\Omcollpublications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omcollpublications|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omcollpublications|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omcollpublications[]    findAll()
 * @method Omcollpublications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmcollpublicationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omcollpublications::class);
    }

    // /**
    //  * @return Omcollpublications[] Returns an array of Omcollpublications objects
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
    public function findOneBySomeField($value): ?Omcollpublications
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
