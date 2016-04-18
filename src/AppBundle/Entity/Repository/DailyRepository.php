<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 16.04.2016
 * Time: 22:00
 */

namespace AppBundle\Entity\Repository;


use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityRepository;

class DailyRepository extends EntityRepository
{
    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @return bool
     */
    public function findByDates(\DateTime $start, \DateTime $end)
    {
        $qb =$this->createQueryBuilder('d');
        return $qb
            ->andWhere($qb->expr()->between('d.datum', ':start', ':end'))
            ->setParameter(':start', $start, Type::DATETIME)
            ->setParameter(':end', $end, Type::DATETIME)
            ->getQuery()
            ->getResult();
    }
}