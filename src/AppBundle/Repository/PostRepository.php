<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{

    public  function findAll()
    {
        $builder = $this->createQueryBuilder('p');
        $query = $builder->select('p')
            ->orderBy('p.dataPosted', 'DESC')
            ->getQuery();
        return $query->getResult();
    }
}
