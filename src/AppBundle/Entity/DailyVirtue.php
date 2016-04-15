<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 04.04.2016
 * Time: 00:31
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class DailyVirtue
 *
 * @ORM\Entity
 */
class DailyVirtue
{
    /**
     * @var Virtue
     *
     * @ORM\OneToOne(targetEntity="Virtue")
     * @ORM\JoinColumn(name="virtue_id", referencedColumnName="id")
     */
    protected $virtue;

    /**
     * @var DateTime
     * @ORM\id
     * @ORM\Column(type="date")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $datum;

    /**
     * @return Virtue
     */
    public function getVirtue()
    {
        return $this->virtue;
    }

    /**
     * @param Virtue $virtue
     */
    public function setVirtue($virtue)
    {
        $this->virtue = $virtue;
    }

    /**
     * @return DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param DateTime $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }
}