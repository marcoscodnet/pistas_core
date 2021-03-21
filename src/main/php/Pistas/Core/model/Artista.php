<?php

namespace Pistas\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * Marca
 * 
 * @Entity @Table(name="pistas_artista")
 * 
 * @author Marcos
 */


class Artista extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;
	
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $imagen;
	
		
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