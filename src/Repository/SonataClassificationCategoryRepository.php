<?php

namespace App\Repository;

use App\Entity\SonataClassificationCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SonataClassificationCategory>
 *
 * @method SonataClassificationCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SonataClassificationCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SonataClassificationCategory[]    findAll()
 * @method SonataClassificationCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SonataClassificationCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataClassificationCategory::class);
    }

    public function save(SonataClassificationCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SonataClassificationCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SonataClassificationCategory[] Returns an array of SonataClassificationCategory objects
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

//    public function findOneBySomeField($value): ?SonataClassificationCategory
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
