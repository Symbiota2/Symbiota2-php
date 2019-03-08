<?php

namespace App\Repository;

use App\Entity\KeyDescriptionDeletions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyDescriptionDeletions|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyDescriptionDeletions|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyDescriptionDeletions[]    findAll()
 * @method KeyDescriptionDeletions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyDescriptionDeletionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyDescriptionDeletions::class);
    }

    // /**
    //  * @return KeyDescriptionDeletions[] Returns an array of KeyDescriptionDeletions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KeyDescriptionDeletions
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
