<?php

namespace App\Repository;

use App\Entity\Omoccurdatasetlink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Omoccurdatasetlink|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omoccurdatasetlink|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omoccurdatasetlink[]    findAll()
 * @method Omoccurdatasetlink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmoccurdatasetlinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Omoccurdatasetlink::class);
    }

    // /**
    //  * @return Omoccurdatasetlink[] Returns an array of Omoccurdatasetlink objects
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
    public function findOneBySomeField($value): ?Omoccurdatasetlink
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
