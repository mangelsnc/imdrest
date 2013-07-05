<?php
namespace IMDRest\DirectorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IMDRest\DirectorBundle\Entity\Director;
use IMDRest\PeliculaBundle\Util\Util;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $nombres = array(
            "Steven Spielberg", "James Cameron", "Quentin Tarantino", 
            "Martin Scorsese", "Peter Jackson", "Tim Burton", "George Lucas"
        );

        $lugarNacimiento = array("Wisconsin", "New York", "Alhabama", "Chicago", "San Francisco", "Texas", "Boston");
        
        for($i=0;$i<count($nombres);$i++){
                
            $director = new Director();
            $director->setNombre($nombres[$i]);
            $dias = rand(14600,23725); //entre 40 y 65 años
            $director->setFechaNacimiento(new \DateTime('now -'.$dias.' days'));
            $director->setLugarNacimiento($lugarNacimiento[$i]);
            $director->setPais("EE.UU");
            
            $manager->persist($director);
        }
        
        $manager->flush();         
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }
}