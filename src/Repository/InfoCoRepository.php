<?php

namespace App\Repository;

use App\Entity\InfoCo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoCo|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoCo|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoCo[]    findAll()
 * @method InfoCo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoCoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoCo::class);
    }

    // /**
    //  * @return InfoCo[] Returns an array of InfoCo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoCo
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
