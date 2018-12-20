<?php

namespace App\Repository;

use App\Entity\Glossarytermlink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glossarytermlink|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glossarytermlink|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glossarytermlink[]    findAll()
 * @method Glossarytermlink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossarytermlinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glossarytermlink::class);
    }

    // /**
    //  * @return Glossarytermlink[] Returns an array of Glossarytermlink objects
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
    public function findOneBySomeField($value): ?Glossarytermlink
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
