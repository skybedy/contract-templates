<?php

namespace App\Repository;

use App\Entity\SignatureAuthenticity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SignatureAuthenticity>
 *
 * @method SignatureAuthenticity|null find($id, $lockMode = null, $lockVersion = null)
 * @method SignatureAuthenticity|null findOneBy(array $criteria, array $orderBy = null)
 * @method SignatureAuthenticity[]    findAll()
 * @method SignatureAuthenticity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignatureAuthenticityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignatureAuthenticity::class);
    }

    //    /**
    //     * @return SignatureAuthenticity[] Returns an array of SignatureAuthenticity objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SignatureAuthenticity
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
