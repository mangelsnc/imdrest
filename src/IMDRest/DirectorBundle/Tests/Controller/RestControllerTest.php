<?php

namespace IMDRest\DirectorBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function responseContentShouldBeJson()
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
