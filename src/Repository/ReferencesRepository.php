<?php

namespace App\Repository;

use Reference\Entity\References;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method References|null find($id, $lockMode = null, $lockVersion = null)
 * @method References|null findOneBy(array $criteria, array $orderBy = null)
 * @method References[]    findAll()
 * @method References[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, References::class);
    }

    // /**
    //  * @return References[] Returns an array of References objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?References
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
