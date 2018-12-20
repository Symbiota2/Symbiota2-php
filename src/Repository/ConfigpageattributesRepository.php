<?php

namespace App\Repository;

use App\Entity\Configpageattributes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Configpageattributes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Configpageattributes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Configpageattributes[]    findAll()
 * @method Configpageattributes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigpageattributesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Configpageattributes::class);
    }

    // /**
    //  * @return Configpageattributes[] Returns an array of Configpageattributes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Configpageattributes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
