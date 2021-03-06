<?php

namespace Shiawa\BlogBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getCategories($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('c');

        $query->orderBy('c.name', 'ASC')
            ->getQuery();

        $query
            ->setFirstResult(($page-1)* $nbPerPage)
            ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }
}
