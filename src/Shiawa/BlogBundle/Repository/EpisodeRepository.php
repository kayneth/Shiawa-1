<?php

namespace Shiawa\BlogBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * EpisodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EpisodeRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEpisodes($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('e')
            ->orderBy('e.createdAt', 'DESC')
            ->getQuery();

        $query
            ->setFirstResult(($page-1)* $nbPerPage)
            ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getLast($limit) {
        $query = $this->createQueryBuilder('e')
            ->orderBy('e.createdAt', 'DESC')
            ->getQuery();

        $query
            ->setMaxResults($limit);

        return $query->getResult();
    }

    public function getArrayEpisode($anime, $limit = null)
    {
        $query = $this->createQueryBuilder('e')
            ->innerJoin('e.anime', 'a')
            ->where('a.title LIKE :anime')
            ->setParameter('anime', '%'.$anime.'%')
            //->setMaxResults($limit)
            ->getQuery();

        return $query->getResult();
    }
}
