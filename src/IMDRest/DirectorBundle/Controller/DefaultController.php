<?php

namespace IMDRest\DirectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DirectorBundle:Default:index.html.twig', array('name' => $name));
    }
}
