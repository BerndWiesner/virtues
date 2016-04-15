<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 03.04.2016
 * Time: 22:56
 */

namespace AppBundle;

use Doctrine\ORM\EntityManager;

class VirtueProvider
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }

    public function getRandomVirtue($exclude = [])
    {
        $allVirtues = $this->em->getRepository('AppBundle:Virtue')->findAll();
        
        return array_rand($allVirtues);
    }

    public function getVirtueForDate()
    {
        
    }
}