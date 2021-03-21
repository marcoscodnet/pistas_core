<?php
namespace Pistas\Core\dao;

/**
 * Factory de DAOs
 *  
 * @author Marcos
 *
 */

use Pistas\Core\dao\impl\ArtistaDoctrineDAO;



use Pistas\Core\dao\impl\PistaDoctrineDAO;


class DAOFactory {

	

	
	
	/**
	 * DAO para Artista.
	 * 
	 * @return IArtista
	 */
	public static function getArtistaDAO(){
	
		return new ArtistaDoctrineDAO();	
	}
	
		
	
	
	/**
	 * DAO para Pista.
	 * 
	 * @return IPista
	 */
	public static function getPistaDAO(){
	
		return new PistaDoctrineDAO();	
	}
	
	
	
}
