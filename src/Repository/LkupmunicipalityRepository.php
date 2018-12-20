<?php

namespace App\Repository;

use App\Entity\Lkupmunicipality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lkupmunicipality|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lkupmunicipality|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lkupmunicipality[]    findAll()
 * @method Lkupmunicipality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LkupmunicipalityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lkupmunicipality::class);
    }

    // /**
    //  * @return Lkupmunicipality[] Returns an array of Lkupmunicipality objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lkupmunicipality
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
