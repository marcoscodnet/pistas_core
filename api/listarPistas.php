<?php


include_once  dirname(__DIR__) . '/vendor/autoload.php';


use Pistas\Core\utils\PistasUtils;
use Pistas\Core\service\ServiceFactory;


use Pistas\Core\conf\PistasConfig;
use Cose\persistence\PersistenceContext;

//inicializamos cuentas core.
PistasConfig::getInstance()->initialize();
PistasConfig::getInstance()->initLogger( dirname(__FILE__).  "/logListarPistas.xml");
				
$persistenceContext =  PersistenceContext::getInstance();





PistasUtils::log("Obteniendo resultados");
//$finalizados = $service->importarSorteosEnVivo();




/*$repeticiones=1; //vamos a hacer 80 repeticiones, 1 cada 30 seg, son 40 minutos de sorteo.
while(($finalizados==false) && $repeticiones<=80){
	sleep(30);
	$finalizados = $service->importarSorteosEnVivo();
	$repeticiones++;
}

if( $finalizados ){
	
	PistasUtils::log("Los sorteos han finalizado");
	
}else{
	
	PistasUtils::log("Se excedieron la cantidad de repeticiones");
	
}*/

//cerramos la conexión a la base.
$persistenceContext->close();
    


?>