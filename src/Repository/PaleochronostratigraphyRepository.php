<?php

namespace App\Repository;

use App\Entity\Paleochronostratigraphy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Paleochronostratigraphy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paleochronostratigraphy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paleochronostratigraphy[]    findAll()
 * @method Paleochronostratigraphy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaleochronostratigraphyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Paleochronostratigraphy::class);
    }

    // /**
    //  * @return Paleochronostratigraphy[] Returns an array of Paleochronostratigraphy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paleochronostratigraphy
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
