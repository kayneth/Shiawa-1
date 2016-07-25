<?php

namespace Shiawa\UserBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByRole($role)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%"'.$role.'"%');

        return $qb->getQuery()->getResult();
    }

    public function findByRoles(Array $roles)
    {
        $qb = $this->createQueryBuilder('u');

        for($i = 0; $i < count($roles); $i++)
        {
            $qb->orwhere('u.roles LIKE :role'.$i);
        }

        for($i = 0; $i < count($roles); $i++)
        {
            $qb->setParameter('role'.$i, '%"'.$roles[$i].'"%');
        }

        return $qb->distinct()->getQuery()->getResult();
    }
}
