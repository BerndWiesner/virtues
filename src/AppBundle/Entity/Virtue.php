<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 03.04.2016
 * Time: 22:08
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Virtue
 * 
 * @ORM\Entity
 */
class Virtue
{
    /**
     * @var int
     *
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250)
     */
    protected $title;

    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Slogan", mappedBy="virtue")
     */
    protected $slogans;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250)
     */
    protected $motto;

    public function __construct()
    {
        $this->slogans = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMotto()
    {
        return $this->motto;
    }

    /**
     * @param string $motto
     */
    public function setMotto($motto)
    {
        $this->motto = $motto;
    }

    /**
     * @return ArrayCollection
     */
    public function getSlogans()
    {
        return $this->slogans;
    }

    /**
     * @param ArrayCollection $slogans
     */
    public function setSlogans(ArrayCollection $slogans)
    {
        $this->slogans = $slogans;
    }
}