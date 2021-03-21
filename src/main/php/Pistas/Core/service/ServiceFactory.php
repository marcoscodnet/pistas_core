<?php
namespace Pistas\Core\service;

/**
 * Factory de servicios
 *  
 *  
 * @author Marcos
 * @since 16-03-2018
 *
 */

use Pistas\Core\service\impl\ArtistaServiceImpl;

use Pistas\Core\service\impl\PistaServiceImpl;


class ServiceFactory {


	
	
	
	
	
	
	/**
	 * Service para Artista.
	 * 
	 * @return IArtistaService
	 */
	public static function getArtistaService(){
	
		return new ArtistaServiceImpl();	
	}
	
	
	/**
	 * Service para Pista.
	 * 
	 * @return IPistaService
	 */
	public static function getPistaService(){
	
		return new PistaServiceImpl();	
	}
	
	
}