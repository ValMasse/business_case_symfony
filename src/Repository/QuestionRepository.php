<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    // /**
    //  * @return all questions for each test
    //  */
    
    public function findQuestionsForEachTest($testId)
    {
        return $this->createQueryBuilder('q')
            ->innerJoin('q.testTechnique', 'testTechnique')
            ->andWhere('q.testTechnique = :val')
            ->setParameter('val', $testId)
            ->orderBy('q.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /*public function findQuestionsForEachTestByOne($testTechniqueId, int $offset): Paginator
    {
        $query = $this->createQueryBuilder('q')
            ->innerJoin('q.testTechnique', 'testTechnique')
            ->andWhere('q.testTechnique = :val')
            ->setParameter('val', $testTechniqueId)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery()
            ;

            return new Paginator($query);
    }*/

    /*
    public function findOneBySomeField($value): ?Question
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
