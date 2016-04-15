<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 03.04.2016
 * Time: 21:47
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VirtuesController extends Controller
{
    public function randomAction()
    {

    }

    /**
     * @Route("/{day}", name="daily", defaults={"day" = "now"})
     */
    public function defaultAction($day)
    {
        try {
            $date = new \DateTime($day);
        } catch (\Exception $e) {
            $date = new \DateTime();
        }

        return $this->render(':virtues:show.html.twig',['date' => $date->format('y-m-d')]) ;
    }
    
    
    
    public function randomAction()
    {
        
    }
}