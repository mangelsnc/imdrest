<?php

namespace IMDRest\DirectorBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function responseContentShouldBeJsonByDefault()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rest/directors');    
        
        $this->assertJsonResponse($client->getResponse());
    }
    
    /**
     * @test
     */    
    public function itShouldListAllTheDirectors()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rest/directors');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 200);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns404WhenNotExistsResource()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rest/directors/fake-resource');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 404);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns201WhenNewResourceIsCreated()
    {
        $client = static::createClient();
      
        $client->request(
            'POST',
            '/rest/director',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'), 
            '{"nombre":"Pedro Almodovar"}'
         );
        
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 201);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns400WhenPostPetitionIsMalformed()
    {
        $client = static::createClient();
      
        $client->request(
            'POST',
            '/rest/director',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'), 
            '{"nombreDirector":"Pedro Almodovar"}'
         );
        
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 400);
    }
    
    /**
     * @test
     */
    public function itShouldReturns204WhenResourceIsEdited()
    {
        $client = static::createClient();
        
        $client->request(
            'PUT',
            '/rest/directors/pedro-almodovar',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"nombre":"Pedro Almodovar", "fechaNacimiento":"1953-06-12 00:00:00", "lugarNacimiento":"Zaragoza", "pais":"España", "bio":"Es un hombre bien"}'
        );
        $statusCode = $client->getResponse()->getStatusCode();
        
        $this->assertEquals($statusCode, 204);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns405WhenMethodNotAllowed()
    {
        $client = static::createClient();
      
        $client->request(
            'PUT',
            '/rest/director',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'), 
            '{"nombreDirector":"Pedro Almodovar"}'
         );
        
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 405);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns400WhenPutPetitionIsMalformed()
    {
        $client = static::createClient();
      
        $client->request(
            'PUT',
            '/rest/directors/pedro-almodovar',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'), 
            '{"nombreDirector":"Pedro Almodovar"}'
         );
        
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 400);
    }
    
     /**
     * @test
     */    
    public function itShouldReturns404WhenTryToDeleteInexistentResource()
    {
        $client = static::createClient();

        $crawler = $client->request('DELETE', '/rest/directors/bryan-de-palma');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 404);
    }
    
    /**
     * @test
     */    
    public function itShouldReturns204WhenResourceIsDeleted()
    {
        $client = static::createClient();

        $crawler = $client->request('DELETE', '/rest/directors/pedro-almodovar');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertEquals($statusCode, 204);
    }
    
    protected function assertJsonResponse($response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    } 
}
