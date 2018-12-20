<?php

namespace App\Repository;

use App\Entity\Uploadspecmap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploadspecmap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploadspecmap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploadspecmap[]    findAll()
 * @method Uploadspecmap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadspecmapRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploadspecmap::class);
    }

    // /**
    //  * @return Uploadspecmap[] Returns an array of Uploadspecmap objects
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
    public function findOneBySomeField($value): ?Uploadspecmap
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
