<?php

namespace App\Repository;

use App\Entity\Addition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Addition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Addition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Addition[]    findAll()
 * @method Addition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdditionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Addition::class);
    }

    // /**
    //  * @return Addition[] Returns an array of Addition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Addition
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
