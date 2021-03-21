<?php
namespace Pistas\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de Artista
 *  
 * @author Marcos
 *
 */
class ArtistaCriteria extends Criteria{

	private $nombre;
	
	
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	
}