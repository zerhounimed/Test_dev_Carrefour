<?php

namespace App\Repository;

use App\Entity\UserListing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserListing|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserListing|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserListing[]    findAll()
 * @method UserListing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserListing::class);
    }

    // /**
    //  * @return UserListing[] Returns an array of UserListing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserListing
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
