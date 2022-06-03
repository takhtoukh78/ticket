<?php

namespace App\Repository;

use App\Entity\PanneauxEtat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PanneauxEtat>
 *
 * @method PanneauxEtat|null find($id, $lockMode = null, $lockVersion = null)
 * @method PanneauxEtat|null findOneBy(array $criteria, array $orderBy = null)
 * @method PanneauxEtat[]    findAll()
 * @method PanneauxEtat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PanneauxEtatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PanneauxEtat::class);
    }

    public function add(PanneauxEtat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PanneauxEtat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PanneauxEtat[] Returns an array of PanneauxEtat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PanneauxEtat
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
