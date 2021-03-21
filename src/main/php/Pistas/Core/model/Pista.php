<?php

namespace Pistas\Core\model;

use Cose\model\impl\Entity;

use Pistas\Core\model\Artista;

use Cose\utils\Logger;

/**
 * Titulo
 * 
 * @Entity @Table(name="pistas_pista")
 * 
 * @author Marcos
 */

class Pista extends Entity{

	

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;


	

	/**
     * @ManyToOne(targetEntity="Pistas\Core\model\Artista",cascade={"detach"})
     * @JoinColumn(name="artista_oid", referencedColumnName="oid")
     * 
     * artista de la pista
     **/
    private $artista;
    

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $mp3;
	
	
		
	public function __construct(){
	}
	
	public function __toString(){
		 return $this->getNombre();
	}


	

	
	
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getArtista()
	{
	    return $this->artista;
	}

	public function setArtista($artista)
	{
	    $this->artista = $artista;
	}
	
	public function getMp3()
	{
	    return $this->mp3;
	}

	public function setMp3($mp3)
	{
	    $this->mp3 = $mp3;
	}
	
	public function getImagen()
	{
	    return $this->imagen;
	}

	public function setImagen($imagen)
	{
	    $this->imagen = $imagen;
	}
}
?>