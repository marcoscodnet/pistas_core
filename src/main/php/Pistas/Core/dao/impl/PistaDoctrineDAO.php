<?php
namespace Pistas\Core\dao\impl;

use Pistas\Core\dao\IPistaDAO;

use Pistas\Core\model\Pista;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para Pista
 *  
 * @author Marcos
 * 
 */
class PistaDoctrineDAO extends CrudDAO implements IPistaDAO{
	
	protected function getClazz(){
		return get_class( new Pista() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('p', 'a'))
	   				->from( $this->getClazz(), "p")
					->leftJoin('p.artista', 'a');
		
					
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(p.oid)')
	   				->from( $this->getClazz(), "p")
	   				->leftJoin('p.artista', 'a');
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(p.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}
		
		$artista = $criteria->getArtista();
		if( !empty($artista) && $artista!=null){
			if (is_object($artista)) {
				$artistaOid = $artista->getOid();
				if(!empty($artistaOid))
					$queryBuilder->andWhere( "a.oid= $artistaOid" );
			}
			else $queryBuilder->andWhere( "a.nombre like '%$artista%'");
			
		}
		
		$pistaOArtista = $criteria->getPistaOArtista();
		if( !empty($pistaOArtista) ){
			$queryBuilder->orWhere("upper(p.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$pistaOArtista%" );
			$queryBuilder->orWhere("upper(a.nombre)  like :nombre1");
			$queryBuilder->setParameter( "nombre1" , "%$pistaOArtista%" );
		}
		
		
	}	
	
	protected function getFieldName($name){
		
		switch ($name) {
		 	case "artista":
		 		return "a.nombre";
		 	break;
		 	
		 }
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "p.$name";	
		}	
		
	}	
}