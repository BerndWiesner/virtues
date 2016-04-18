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
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\DailyRepository")
 */
class DailyVirtue
{
    /**
     * @var string
     *
     * @ORM\id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @var Virtue
     *
     * @ORM\ManyToOne(targetEntity="Virtue")
     * @ORM\JoinColumn(name="virtue_id", referencedColumnName="id")
     */
    protected $virtue;

    /**
     * @var DateTime
     * @ORM\Column(type="date")
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
    public function setDatum(\DateTime $datum)
    {
        $this->datum = $datum;
        $this->setId($datum->format('Y-m-d'));
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}