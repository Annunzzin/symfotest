<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Track;

/**
 * TrackRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TrackRepository extends \Doctrine\ORM\EntityRepository
{

    public function findAll()
    {
        $queryBuilder = $this->createQueryBuilder('t');
        $queryBuilder->orderBy('t.title','ASC');
        $tracks = $queryBuilder->getQuery()->execute();

        return $tracks;



    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        $queryBuilder = $this->createQueryBuilder('t');
        $queryBuilder->where('t.id =  :id')
            ->setParameter('id',$id);

        $track = $queryBuilder->getQuery()->getOneOrNullResult();

        return $track;

    }
}
