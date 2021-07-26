<?php

namespace App\Repository;

use App\Entity\Paint;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Flex\Path;

/**
 * @method Paint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paint[]    findAll()
 * @method Paint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaintRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paint::class);
    }

    public function lastTree(){
        return $this->createQueryBuilder('p')
                    ->orderBy('p.id','DESC')
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult()
                    ;
    }


   
    public function findAllPortfolio(Category $category)
    {
        return $this->createQueryBuilder('p')
            ->where(':category MEMBER OF p.category')
            ->andWhere('p.portfolio = :TRUE')
            ->setParameter('category', $category)
            ->getQuery()
           
        ;
    }

    


     /**
     * @return Paint[] return an array of penit object
     */
    /*
    public function findOneBySomeField($value): ?Paint
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
