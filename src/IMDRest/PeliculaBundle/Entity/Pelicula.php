<?php

namespace IMDRest\PeliculaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use IMDRest\PeliculaBundle\Entity\Clasificacion as Clasificacion;
use IMDRest\PeliculaBundle\Entity\Genero as Genero;
use IMDRest\DirectorBundle\Entity\Director as Director;

/**
 * Pelicula
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pelicula
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="anyo", type="string", length=4)
     */
    private $anyo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="IMDRest\PeliculaBundle\Entity\Genero")
     */
    private $genero;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="IMDRest\DirectorBundle\Entity\Director")
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="text")
     */
    private $sinopsis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEstreno", type="date")
     */
    private $fechaEstreno;

    /**
     * @var float
     *
     * @ORM\Column(name="recaudacion", type="float")
     */
    private $recaudacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracion", type="smallint")
     */
    private $valoracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="smallint")
     */
    private $duracion;
    
     /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="IMDRest\PeliculaBundle\Entity\Clasificacion")
     */
    private $clasificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="portada", type="string", length=255)
     */
    private $portada;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Pelicula
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set anyo
     *
     * @param string $anyo
     * @return Pelicula
     */
    public function setAnyo($anyo)
    {
        $this->anyo = $anyo;
    
        return $this;
    }

    /**
     * Get anyo
     *
     * @return string 
     */
    public function getAnyo()
    {
        return $this->anyo;
    }

    /**
     * Set genero
     *
     * @param Genero $genero
     * @return Pelicula
     */
    public function setGenero(Genero $genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return Genero 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set director
     *
     * @param Director $director
     * @return Pelicula
     */
    public function setDirector(Director $director)
    {
        $this->director = $director;
    
        return $this;
    }

    /**
     * Get director
     *
     * @return Director 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set sinopsis
     *
     * @param string $sinopsis
     * @return Pelicula
     */
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;
    
        return $this;
    }

    /**
     * Get sinopsis
     *
     * @return string 
     */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * Set fechaEstreno
     *
     * @param \DateTime $fechaEstreno
     * @return Pelicula
     */
    public function setFechaEstreno($fechaEstreno)
    {
        $this->fechaEstreno = $fechaEstreno;
    
        return $this;
    }

    /**
     * Get fechaEstreno
     *
     * @return \DateTime 
     */
    public function getFechaEstreno()
    {
        return $this->fechaEstreno;
    }

    /**
     * Set recaudacion
     *
     * @param float $recaudacion
     * @return Pelicula
     */
    public function setRecaudacion($recaudacion)
    {
        $this->recaudacion = $recaudacion;
    
        return $this;
    }

    /**
     * Get recaudacion
     *
     * @return float 
     */
    public function getRecaudacion()
    {
        return $this->recaudacion;
    }

    /**
     * Set valoracion
     *
     * @param integer $valoracion
     * @return Pelicula
     */
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;
    
        return $this;
    }

    /**
     * Get valoracion
     *
     * @return integer 
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Pelicula
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }
    
    /**
     * Set clasificacion
     *
     * @param Clasificacion $clasificacion
     * @return Pelicula
     */
    public function setClasificacion(Clasificacion $clasificacion)
    {
        $this->clasificacion = $clasificacion;
    
        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return Clasificacion 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set portada
     *
     * @param string $portada
     * @return Pelicula
     */
    public function setPortada($portada)
    {
        $this->portada = $portada;
    
        return $this;
    }

    /**
     * Get portada
     *
     * @return string 
     */
    public function getPortada()
    {
        return $this->portada;
    }
}
