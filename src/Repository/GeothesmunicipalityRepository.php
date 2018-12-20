<?php

namespace App\Repository;

use App\Entity\Geothesmunicipality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geothesmunicipality|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geothesmunicipality|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geothesmunicipality[]    findAll()
 * @method Geothesmunicipality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeothesmunicipalityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geothesmunicipality::class);
    }

    // /**
    //  * @return Geothesmunicipality[] Returns an array of Geothesmunicipality objects
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
    public function findOneBySomeField($value): ?Geothesmunicipality
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
