<?php

namespace App\Repository;

use App\Entity\Uploadimagetemp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadimagetemp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadimagetemp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadimagetemp[]    findAll()
 * @method Uploadimagetemp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadimagetempRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadimagetemp::class);
    }

    // /**
    //  * @return Uploadimagetemp[] Returns an array of Uploadimagetemp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uploadimagetemp
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
