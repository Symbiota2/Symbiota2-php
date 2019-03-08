<?php

namespace App\Repository;

use App\Entity\CrowdSourceQueue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CrowdSourceQueue|null find($id, $lockMode = null, $lockVersion = null)
 * @method CrowdSourceQueue|null findOneBy(array $criteria, array $orderBy = null)
 * @method CrowdSourceQueue[]    findAll()
 * @method CrowdSourceQueue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrowdSourceQueueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CrowdSourceQueue::class);
    }

    // /**
    //  * @return CrowdSourceQueue[] Returns an array of CrowdSourceQueue objects
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
    public function findOneBySomeField($value): ?CrowdSourceQueue
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
