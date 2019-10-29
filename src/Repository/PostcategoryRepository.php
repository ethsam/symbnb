<?php

namespace App\Repository;

use App\Entity\Postcategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Postcategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Postcategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Postcategory[]    findAll()
 * @method Postcategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostcategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Postcategory::class);
    }

    // /**
    //  * @return Postcategory[] Returns an array of Postcategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Postcategory
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
