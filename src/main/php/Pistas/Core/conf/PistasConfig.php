<?php
namespace Pistas\Core\conf;

use Cose\conf\CoseConfig;
use Cose\utils\Logger;
use Cose\persistence\PersistenceConfig;

/**
 * configuración del proyecto
 *  
 * @author Marcos
 *
 */
class PistasConfig {

	/**
	 * singleton instance
	 * @var pistasConfig
	 */
	private static $instance;
	
	private $dbHost = '163.10.35.34';
	private $dbName = "cose_pistas";
	private $dbUser = 'root';
	private $dbPassword = 'secyt';
		
	private $connectionDriver = "pdo_mysql";
	private $defaultPersistenUnit = "default";

	const PROXIES_NAMESPACE="pistas\\Core\\Proxies";
	const PROXIES_PATH=  "/Proxies";

	const TEST_MODE = true;
	const MAIL_FROM_NAME = "pistas";
	const MAIL_FROM = "marcos.pinero1976@gmail.com";
	const TEST_MAIL_TO = "marcos.pinero1976@gmail.com";
	const MAIL_DEFAULT = "mail@ejemplo.com";
	
	//envío de emails produccion.
	const POP_MAIL_HOST ='smtp.gmail.com';
	const POP_MAIL_PORT ='465';
	const POP_MAIL_SMTP_SECURE ='ssl';
	const POP_MAIL_USERNAME ='crones.codnet@gmail.com';
	const POP_MAIL_PASSWORD ='cret0149';
	const MAIL_ENVIO_POP =true;
	
	//envío de emails local.
	
	
	
	private $templatesPath= "";
	private $webPath;
	private $libsPath= "";

	private $doctrineHome;
	
	private function __construct(){

	}
	
	public static function getInstance(){
		if (  !self::$instance instanceof self ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	/**
	 * inicializamos turnos core.
	 */
	public function initialize(  ){
		
		//$this->setDoctrineHome($doctrineHome);
		
		//inicializamos el fmk Cose
		$coseConfig = CoseConfig::getInstance();
		$coseConfig->initialize();
		
		
		setlocale(LC_ALL, "es_AR.UTF-8");
		
		
		//inicializamos la persistencia.
		$this->initPersistence();
		

	}

	/**
	 * inicializamos la configuración de la persistencia.
	 */
	public function initPersistence(){
	
		$connectionOptions = array(
						    'driver'   => $this->getConnectionDriver(),
						    'host'     =>  $this->getDbHost(),
						    'dbname'   => $this->getDbName(),
						    'user'     => $this->getDbUser(),
						    'password' => $this->getDbPassword(),
							'charset' => 'utf8',
		                	'driverOptions' => array(
		                    	    1002=>'SET NAMES utf8'
		                	)
						);
						
		$pathEntities = dirname(__DIR__) ;
		
		$proxiesPath = dirname(__DIR__) . self::PROXIES_PATH;
		
		PersistenceConfig::configure( $this->getDefaultPersistenUnit(), self::PROXIES_NAMESPACE, $proxiesPath, $pathEntities, $connectionOptions);
		
		PersistenceConfig::setDefaultUnit($this->getDefaultPersistenUnit());
	}
	
	/**
	 * se inicializa el logger
	 * @param string $xml path al archivo de configuración xml
	 */
	public function initLogger($xml){
	
		Logger::configure( $xml );
		
		
	}
	
	public static function setInstance($instance)
	{
	    self::$instance = $instance;
	}



	public function getDoctrineHome()
	{
	    return $this->doctrineHome;
	}

	public function setDoctrineHome($doctrineHome)
	{
	    $this->doctrineHome = $doctrineHome;
	}

	

	public function getDbHost()
	{
	    return $this->dbHost;
	}

	public function setDbHost($dbHost)
	{
	    $this->dbHost = $dbHost;
	}

	public function getDbName()
	{
	    return $this->dbName;
	}

	public function setDbName($dbName)
	{
	    $this->dbName = $dbName;
	}

	public function getDbUser()
	{
	    return $this->dbUser;
	}

	public function setDbUser($dbUser)
	{
	    $this->dbUser = $dbUser;
	}

	public function getDbPassword()
	{
	    return $this->dbPassword;
	}

	public function setDbPassword($dbPassword)
	{
	    $this->dbPassword = $dbPassword;
	}

	public function getConnectionDriver()
	{
	    return $this->connectionDriver;
	}

	public function setConnectionDriver($connectionDriver)
	{
	    $this->connectionDriver = $connectionDriver;
	}

	public function getDefaultPersistenUnit()
	{
	    return $this->defaultPersistenUnit;
	}

	public function setDefaultPersistenUnit($defaultPersistenUnit)
	{
	    $this->defaultPersistenUnit = $defaultPersistenUnit;
	}

	

	public function getWebPath()
	{
	    return $this->webPath;
	}

	public function setWebPath($webPath)
	{
	    $this->webPath = $webPath;
	}

	public function getLibsPath()
	{
	    return $this->libsPath;
	}

	public function setLibsPath($libsPath)
	{
	    $this->libsPath = $libsPath;
	}

	
}