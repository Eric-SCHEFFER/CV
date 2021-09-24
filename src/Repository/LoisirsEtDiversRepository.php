<?php

namespace App\Repository;

use App\Entity\LoisirsEtDivers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoisirsEtDivers|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoisirsEtDivers|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoisirsEtDivers[]    findAll()
 * @method LoisirsEtDivers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoisirsEtDiversRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoisirsEtDivers::class);
    }

    // /**
    //  * @return LoisirsEtDivers[] Returns an array of LoisirsEtDivers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoisirsEtDivers
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
