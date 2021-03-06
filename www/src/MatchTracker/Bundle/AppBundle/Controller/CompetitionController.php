<?php

namespace MatchTracker\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Session;
use MatchTracker\Bundle\AppBundle\Entity\Leagues;
use MatchTracker\Bundle\AppBundle\Form\LeaguesType;
use Symfony\Component\Form\FormError;
use MatchTracker\Bundle\AppBundle\Entity\Standings;

/**
 * Competition Controller
 */
class CompetitionController extends Controller {

    /**
     * Competition summary with or without filter
     *
     * @param $sport
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($sport) {

        $leagues = $this->getDoctrine()
            ->getRepository('MatchTrackerAppBundle:Leagues')
            ->findAll();


		return $this->render('MatchTrackerAppBundle:Competition:index.html.twig',
				array('leagues' => $leagues));
	}

    /**
     * Detail view of a competition
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction($nameCanonical, $option) {

    	$league = $this->getDoctrine()
    	    ->getRepository('MatchTrackerAppBundle:Leagues')
    	    ->findOneBy(array('nameCanonical' => $nameCanonical));

        $standing = $league->getStandings();

        $matches = $this->getDoctrine()
            ->getRepository('MatchTrackerAppBundle:Matches')
            ->findBy(
            array('leagues' => $league),
            array('date' => 'ASC')
        )
        ;

        return $this->render('MatchTrackerAppBundle:Competition:detail.html.twig',
        		array(
                    'league' => $league,
                    'standings' => $standing,
                    'option' => $option,
                    'matches' => $matches
                ));
    }

}
