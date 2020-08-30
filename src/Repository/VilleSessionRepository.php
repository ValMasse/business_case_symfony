<?php

namespace App\Repository;

use App\Entity\VilleSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VilleSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method VilleSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method VilleSession[]    findAll()
 * @method VilleSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VilleSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VilleSession::class);
    }

    // /**
    //  * @return VilleSession[] Returns an array of VilleSession objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VilleSession
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
