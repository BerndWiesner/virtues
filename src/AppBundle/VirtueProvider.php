<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 03.04.2016
 * Time: 22:56
 */

namespace AppBundle;

use AppBundle\Entity\DailyVirtue;
use AppBundle\Entity\Virtue;
use Doctrine\ORM\EntityManager;

/**
 * Class VirtueProvider
 * @package AppBundle
 */
class VirtueProvider
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * VirtueProvider constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }

    /**
     * @param array $exclude
     *
     * @return Virtue
     */
    public function getRandomVirtue($exclude = [])
    {
        $choices = $this->em->getRepository('AppBundle:Virtue')->findAllExcluding($exclude);
        return $choices[array_rand($choices)];
    }

    /**
     * @param \DateTime $date
     *
     * @return DailyVirtue
     */
    public function getVirtueForDate(\DateTime $date)
    {
        $repo = $this->em->getRepository('AppBundle:DailyVirtue');

        $virtue = $repo->findOneByDatum($date);

        if ($virtue !== null) {
            return $virtue;
        }

        $start = clone $date;
        $start->sub(new \DateInterval('P3D'));
        $end = clone $date;
        $end->add(new \DateInterval('P3D'));

        $result = $repo->findByDates($start, $end);

        $exclude = [];
        foreach ($result as $item) {
            $exclude[$item->getVirtue()->getId()] = true;
        }
        $virtue = $this->getRandomVirtue($exclude);

        $today = new DailyVirtue();
        $today->setDatum($date);
        $today->setVirtue($virtue);

        $this->em->persist($today);
        $this->em->flush();

        return $today;
    }
}