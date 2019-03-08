<?php

namespace App\Repository;

use App\Entity\CrowdSourceCentral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CrowdSourceCentral|null find($id, $lockMode = null, $lockVersion = null)
 * @method CrowdSourceCentral|null findOneBy(array $criteria, array $orderBy = null)
 * @method CrowdSourceCentral[]    findAll()
 * @method CrowdSourceCentral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrowdSourceCentralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CrowdSourceCentral::class);
    }

    // /**
    //  * @return CrowdSourceCentral[] Returns an array of CrowdSourceCentral objects
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
    public function findOneBySomeField($value): ?CrowdSourceCentral
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
