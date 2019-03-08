<?php

namespace App\Repository;

use App\Entity\OccurrenceComments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OccurrenceComments|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccurrenceComments|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccurrenceComments[]    findAll()
 * @method OccurrenceComments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccurrenceCommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OccurrenceComments::class);
    }

    // /**
    //  * @return OccurrenceComments[] Returns an array of OccurrenceComments objects
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
    public function findOneBySomeField($value): ?OccurrenceComments
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
