<?php
namespace IMDRest\DirectorBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use IMDRest\DirectorBundle\Entity\Director as Director;
use IMDRest\DirectorBundle\Form\DirectorType as DirectorType;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @Rest\RouteResource("Director")
 */
class RestController extends FOSRestController
{
    /**
     * @Rest\View
     *
     * @ApiDoc(
     *    section = "directors",
     *    resource = true,
     *    description = "Get a Director resource identified by slug",
     *    output = "IMDRest\DirectorBundle\Entity\Director",
     *    statusCodes = {
     *      200 = "Successful petition",
     *      404 = "Director not found"
     *    }
     * )
     */
    public function getAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $director = $em->getRepository("DirectorBundle:Director")->findOneBySlug($slug);
        
        if(!$director){
            $view = $this->view("Resource Not Found",404);
            return $this->handleView($view);
        }
        
        $view = $this->view($director, 200);

        return $this->handleView($view);
    }
    
    /**
     * @Rest\View
     *
     * @ApiDoc(
     *    section = "directors",
     *    resource = false,
     *    description = "Gets the entire Directors resource collection",
     *    output = "IMDRest\DirectorBundle\Entity\Director",
     *    statusCodes = {
     *      200 = "Successful petition"
     *    }
     * )
     */
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $directores = $em->getRepository("DirectorBundle:Director")->findAll();
        
        $view = $this->view($directores, 200);

        return $this->handleView($view);
    }
    
    
    /**
     * @Rest\View
     *
     * @ApiDoc(
     *    section = "directors",
     *    resource = false,
     *    description = "Create a new Director resource",
     *    input = "IMDRest\DirectorBundle\Form\DirectorType",
     *    statusCodes = {
     *      201 = "Resource created correctly",
     *      400 = "Bad Request"
     *    }
     * )
     */
    public function postAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();    
        
        $director = new Director();
        
        $form = $this->createForm(new DirectorType(), $director);
        
        $data = $this->getRequest()->request->all();
        //$children = $form->all()->all();
        //$toBind = array_intersect_key($data, $children->all());
        
        $form->bind($data);
        
        if($form->isValid())
        {
            $em->persist($director);
            $em->flush();
            
            $view = View::create();
            $view->setStatusCode(201);
            $view->setHeader(
                "Location", 
                $this->generateUrl(
                    'get_director', 
                    array('slug' => $director->getSlug()),
                    true
                )
            );
            
            return $this->handleView($view);
        }
        
        $view = $this->view($form, 400);
        return $this->handleView($view);
    }
    
    /**
     * @Rest\View
     *
     * @ApiDoc(
     *    section = "directors",
     *    resource = false,
     *    description = "Update a Director resource",
     *    input = "IMDRest\DirectorBundle\Form\DirectorType",
     *    statusCodes = {
     *      204 = "Resource updated correctly",
     *      404 = "Director Not Found",
     *      400 = "Bad Request"
     *    }
     * )
     */
    public function putAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $director = $em->getRepository("DirectorBundle:Director")->findOneBySlug($slug);
        
        if(!$director){
            $view = $this->view("Resource Not Found",404);
            return $this->handleView($view);
        }
        
        $form = $this->createForm(new DirectorType(), $director);
        $data = $this->getRequest()->request->all();
        $form->bind($data);
        
        if($form->isValid())
        {
            $em->persist($director);
            $em->flush();
            
            $view = View::create();
            $view->setStatusCode(204);
            $view->setHeader(
                "Location",
                $this->generateUrl(
                    'get_director', 
                    array('slug' => $director->getSlug()),
                    true
                )
            );
            
            return $this->handleView($view);
        }
        
        $view = $this->view($form, 400);
        return $this->handleView($view);
    }
    
    
    /**
     * @Rest\View
     *
     * @ApiDoc(
     *    section = "directors",
     *    resource = false,
     *    description = "Delete a Director resource",
     *    statusCodes = {
     *      204 = "Resource deleted correctly",
     *      404 = "Director Not Found"
     *    }
     * )
     */
    public function deleteAction($slug)
    {
        $em = $this->getDoctrine()->getManager();    
        $director = $em->getRepository("DirectorBundle:Director")->findOneBySlug($slug);
        
        if(!$director){
            $view = $this->view("No existe el recurso buscado", 404);
            return $this->handleView($view);
        }   
        
        $em->remove($director);
        $em->flush();
        
        $view = View::create();
        $view->setStatusCode(204);
        return $this->handleView($view);
    }
}
