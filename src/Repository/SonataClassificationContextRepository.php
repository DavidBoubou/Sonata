<?php

namespace App\Repository;

use App\Entity\SonataClassificationContext;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SonataClassificationContext>
 *
 * @method SonataClassificationContext|null find($id, $lockMode = null, $lockVersion = null)
 * @method SonataClassificationContext|null findOneBy(array $criteria, array $orderBy = null)
 * @method SonataClassificationContext[]    findAll()
 * @method SonataClassificationContext[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SonataClassificationContextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataClassificationContext::class);
    }

    public function save(SonataClassificationContext $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SonataClassificationContext $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SonataClassificationContext[] Returns an array of SonataClassificationContext objects
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

//    public function findOneBySomeField($value): ?SonataClassificationContext
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
