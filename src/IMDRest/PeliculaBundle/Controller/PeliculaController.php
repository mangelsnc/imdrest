<?php

namespace IMDRest\PeliculaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PeliculaController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PeliculaBundle:Default:index.html.twig', array('name' => $name));
    }
}
