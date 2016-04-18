<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 16.04.2016
 * Time: 22:27
 */

namespace AppBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;

class VirtueRepository extends EntityRepository
{
    public function findAllExcluding(array $excludeIds)
    {
        $qb = $this->createQueryBuilder('v');

        if (count($excludeIds) > 0) {
            $qb->add('where', $qb->expr()->andX($qb->expr()->notIn('v.id', $excludeIds)) );
        }
        
        return $qb
            ->getQuery()
            ->getResult();
    }
}