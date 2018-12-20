<?php

namespace App\Repository;

use App\Entity\Tmattributes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tmattributes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tmattributes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tmattributes[]    findAll()
 * @method Tmattributes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TmattributesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tmattributes::class);
    }

    // /**
    //  * @return Tmattributes[] Returns an array of Tmattributes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tmattributes
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
