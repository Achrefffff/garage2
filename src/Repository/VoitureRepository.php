<?php

namespace App\Repository;

use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voiture>
 *
 * @method Voiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voiture[]    findAll()
 * @method Voiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voiture::class);
    }

    public function findByFilters($prixMin, $prixMax, $kmMin, $kmMax, $anneeMin, $anneeMax): array
    {
        $queryBuilder = $this->createQueryBuilder('v');

        if ($prixMin) {
            $queryBuilder->andWhere('v.prix >= :prixMin')
                ->setParameter('prixMin', $prixMin);
        }

        if ($prixMax) {
            $queryBuilder->andWhere('v.prix <= :prixMax')
                ->setParameter('prixMax', $prixMax);
        }

        if ($kmMin) {
            $queryBuilder->andWhere('v.kilometrage >= :kmMin')
                ->setParameter('kmMin', $kmMin);
        }

        if ($kmMax) {
            $queryBuilder->andWhere('v.kilometrage <= :kmMax')
                ->setParameter('kmMax', $kmMax);
        }

        if ($anneeMin) {
            $queryBuilder->andWhere('v.dateCirculation >= :anneeMin')
                ->setParameter('anneeMin', $anneeMin);
        }

        if ($anneeMax) {
            $queryBuilder->andWhere('v.dateCirculation <= :anneeMax')
                ->setParameter('anneeMax', $anneeMax);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
