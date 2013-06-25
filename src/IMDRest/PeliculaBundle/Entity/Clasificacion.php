<?php

namespace IMDRest\PeliculaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clasificacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Clasificacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="siglas", type="string", length=255)
     */
    private $siglas;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Clasificacion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set siglas
     *
     * @param string $siglas
     * @return Clasificacion
     */
    public function setSiglas($siglas)
    {
        $this->siglas = $siglas;
    
        return $this;
    }

    /**
     * Get siglas
     *
     * @return string 
     */
    public function getSiglas()
    {
        return $this->siglas;
    }
}
