<?php

namespace App\Repository;

use App\Entity\KeyDescriptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyDescriptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyDescriptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyDescriptions[]    findAll()
 * @method KeyDescriptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyDescriptionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyDescriptions::class);
    }

    // /**
    //  * @return KeyDescriptions[] Returns an array of KeyDescriptions objects
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
    public function findOneBySomeField($value): ?KeyDescriptions
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
