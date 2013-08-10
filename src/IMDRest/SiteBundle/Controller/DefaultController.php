<?php

namespace IMDRest\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="portada")
     * @Template("SiteBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        
        return array();
    }
}
