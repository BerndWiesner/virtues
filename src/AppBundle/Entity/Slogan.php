<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 04.04.2016
 * Time: 00:02
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Slogan
 *
 * @ORM\Entity
 */
class Slogan
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
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @var Virtue
     *
     * @ORM\ManyToOne(targetEntity="Virtue", inversedBy="slogans")
     * @ORM\JoinColumn(name="virtue_id", referencedColumnName="id")
     */
    protected $virtue;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

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
    public function setVirtue(Virtue $virtue)
    {
        $this->virtue = $virtue;
    }
}