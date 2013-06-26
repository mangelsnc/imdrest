<?php
namespace IMDRest\DirectorBundle\Controller;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use IMDRest\DirectorBundle\Entity\Director as Director;
use IMDRest\DirectorBundle\Form\DirectorType;

/**
 * @RouteResource("Director")
 */
class RestController extends FOSRestController
{
    /**
     * @Rest\View
     *
     */
    public function getAction($slug)
    {
        $em = $this->get('doctrine')->getManager();
        
        $director = $em->getRepository("DirectorBundle:Director")->findOneBySlug($slug);
        
        $view = $this->view($director, 200);

        return $this->handleView($view);
    }
    
    /**
     * @Rest\View
     *
     */
    public function cgetAction()
    {
        $em = $this->get('doctrine')->getManager();
        
        $directores = $em->getRepository("DirectorBundle:Director")->findAll();
        
        $view = $this->view($directores, 200);

        return $this->handleView($view);
    }
    
    public function postAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();    
        
        $director = new Director();
        
        $form = $this->createForm(new DirectorType(), $director);
        $form->bind($request);
        
        if($form->isValid())
        {
            $em->persist($director);
            $em->flush();
            
            $response = new Response();
            $response->setStatusCode(201);
            $response->headers->set('Location',
                $this->generateUrl(
                    'get_director', array('slug' => $director->getSlug()),
                    true
                )
            );
        }
        
        return View::create($form, 400);
    }
    
    public function putAction($slug)
    {
        
    }
    
    public function deleteAction($slug)
    {
        
    }
}
