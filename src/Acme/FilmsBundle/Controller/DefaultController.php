<?php

namespace Acme\FilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\FilmsBundle\Entity\Film;
use Acme\FilmsBundle\Form\FilmType;

/**
 * @Route("/film")
 */
class DefaultController extends Controller
{
    /**
     * Lists all Film entities.
     *
     * @Route("/", name="film")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeFilmsBundle:Film')->findAll();

        return array(
            'entities' => $entities,
        );
    }
}
