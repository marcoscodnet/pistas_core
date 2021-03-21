<?php
namespace Pistas\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de Pista
 *  
 * @author Marcos
 *
 */
class PistaCriteria extends Criteria{

	private $nombre;
	
	private $artista;
	
	private $pistaOArtista;
	

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

	public function getPistaOArtista()
	{
	    return $this->pistaOArtista;
	}

	public function setPistaOArtista($pistaOArtista)
	{
	    $this->pistaOArtista = $pistaOArtista;
	}
}