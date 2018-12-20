<?php

namespace App\Repository;

use App\Entity\Usertaxonomy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usertaxonomy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usertaxonomy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usertaxonomy[]    findAll()
 * @method Usertaxonomy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsertaxonomyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usertaxonomy::class);
    }

    // /**
    //  * @return Usertaxonomy[] Returns an array of Usertaxonomy objects
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
    public function findOneBySomeField($value): ?Usertaxonomy
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
