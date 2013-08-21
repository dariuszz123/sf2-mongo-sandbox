<?php

namespace Evispa\PostCodeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PostCodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostCodeRepository extends EntityRepository
{
    public function getLimited($start = 0, $limit = 100) {
        $qb = $this->createQueryBuilder('pc');
        $qb->setFirstResult($start);
        $qb->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}
