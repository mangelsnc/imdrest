<?php

namespace IMDRest\PeliculaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PeliculaController extends Controller
{
    /**
     * @Route("/", name="peliculas_listado")
     * @Template("PeliculaBundle:Default:index.html.twig")
     */    
    public function indexAction()
    {
        $peliculas = array();
        return array('peliculas' => $peliculas);
    }
}
