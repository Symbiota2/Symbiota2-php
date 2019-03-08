<?php

namespace App\Repository;

use App\Entity\GlossarySources;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GlossarySources|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlossarySources|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlossarySources[]    findAll()
 * @method GlossarySources[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlossarySourcesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GlossarySources::class);
    }

    // /**
    //  * @return GlossarySources[] Returns an array of GlossarySources objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GlossarySources
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
