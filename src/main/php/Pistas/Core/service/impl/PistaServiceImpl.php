<?php
namespace Pistas\Core\service\impl;


use Pistas\Core\dao\DAOFactory;

use Pistas\Core\service\IPistaService;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

use Pistas\Core\utils\PistasUtils;

use Pistas\Core\conf\PistasConfig;

/**
 * servicio para Pista
 *  
 * @author Marcos
 * @since 16-03-2018
 *
 */
class PistaServiceImpl extends CrudService implements IPistaService {

	
	protected function getDAO(){
		return DAOFactory::getPistaDAO();
	}
	
	
	/**
	 * redefino el add para agregar funcionalidad
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		/*
		 * Hacemos lo que queremos con la estado. 
		 * Por ejemplo, enviar un email al usuario.
		 */
		
		//agregamos la estado.
		parent::add($entity);
		
		
	}	
	
	function validateOnAdd( $entity ){
	
		/*
		 * Realizamos validaciones sobre la estado. 
		 * Por ejemplo, campos obligatorios.
		 */		
	}
		
	
	function validateOnUpdate( $entity ){
	
		/*
		 * Validaciones como en el add pero 
		 * las necesarias para modificar.
		 */
		
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){
	
		/*
		 * validaciones al borrar una estado.
		 */
	}

	/**
	 * redefino el add
	 * @param $entity
	 * @throws ServiceException
	 */
	public function enviarMail($entity, $nombre, $mail, $mensaje, $lang){
				
				switch ($lang) {
					case 'esusa':
						$pais='Español-USA';
					break;
					
					case 'es':
						$pais='España';
					break;
					
					case 'arg':
						$pais='Argentina';
					break;
					case 'mx':
						$pais='México';
					break;
					
					case 'eng':
						$pais='USA';
					break;
				}
		
				
				$body = "Mensaje enviado desde el sitio " . $pais  ; 
				$body .= " <br /><br /> Nombre : " . $nombre;
				$body .= " <br /> E-mail : " . $mail;
				$body .= "<br /> Pista: " . $entity->getOid().' - '.$entity->getNombre().' - '.$entity->getArtista()->getNombre();
				$body .= "<br /> <br />" . nl2br($mensaje);
				
				$asunto = "Mensaje desde formulario de contacto de la WEB (".$pais.")";
			
							
				
				PistasUtils::sendMail($nombre, $mail,PistasConfig::TEST_MAIL_TO,PistasConfig::TEST_MAIL_TO, $asunto, $body);
				
		
		
	}	
	
	
	
}	