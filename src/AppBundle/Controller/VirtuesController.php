<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 03.04.2016
 * Time: 21:47
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DailyVirtue;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class VirtuesController
 * @package AppBundle\Controller
 */
class VirtuesController extends Controller
{

    /**
     * @Route("/random", name="virtue_random")
     */
    public function randomAction()
    {
        $virtue = $this->get('virtue_provider')->getRandomVirtue();
        return $this->render(':virtues:random.html.twig', ['virtue' => $virtue]);
    }

    /**
     *
     * @Route("/today", name="virtue_today")
     */
    public function todayAction()
    {
        return $this->dateAction();
    }


    /**
     * @param string $day
     *
     * @Route("/date/{day}", name="virtue_date")
     */
    public function dateAction($day = "now")
    {
        try {
            $date = new \DateTime($day);
        } catch (\Exception $e) {
            $date = new \DateTime();
        }

        $diff = $date->diff(new \DateTime());
        if($diff->invert > 0){
            return $this->createFutureResponse();
        }

        $virtue = $this->get('virtue_provider')->getVirtueForDate($date);

        $yesterday = clone $date;
        $yesterday->sub(new \DateInterval('P1D'));
        
        $tomorrow = clone $date;
        $tomorrow->add(new \DateInterval('P1D'));
        
        $tomorrowDiff = $tomorrow->diff(new \DateTime());
        if($tomorrowDiff->invert > 0){
            $tomorrow = null;
        }

        return $this->render(':virtues:show.html.twig', [
            'virtue'    => $virtue,
            'tomorrow'  => $tomorrow,
            'yesterday' => $yesterday
        ]);
    }

    /**
     * @return Response
     */
    protected function createFutureResponse()
    {
        return $this->render(':virtues:future.html.twig');
    }
}