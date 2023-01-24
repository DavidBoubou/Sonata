<?php

namespace App\Repository;

use App\Entity\SonataClassificationTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SonataClassificationTag>
 *
 * @method SonataClassificationTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method SonataClassificationTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method SonataClassificationTag[]    findAll()
 * @method SonataClassificationTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SonataClassificationTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataClassificationTag::class);
    }

    public function save(SonataClassificationTag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SonataClassificationTag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SonataClassificationTag[] Returns an array of SonataClassificationTag objects
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

//    public function findOneBySomeField($value): ?SonataClassificationTag
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
