<?php

namespace App\Repository;

use Checklist\Entity\Checklists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Checklists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Checklists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Checklists[]    findAll()
 * @method Checklists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Checklists::class);
    }

    // /**
    //  * @return Checklists[] Returns an array of Checklists objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Checklists
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
