<?php
	$memStart	= memory_get_usage( true );
	$timeStart	= microtime( true );
	
	//variables de configuracion
	ini_set('display_errors','1');
	error_reporting(E_ALL | E_STRICT | E_DEPRECATED);
	
	//definicio de variables basicas
	define('APP_PUBLIC_PATH', dirname( __FILE__ ).'/');
	define('APP_ROOT_PATH', dirname(dirname( APP_PUBLIC_PATH )).'/');
	define('DS', DIRECTORY_SEPARATOR);
	define('PS', PATH_SEPARATOR);
	define('IDS_CONFIG_PATH', APP_ROOT_PATH.'/config/config.ini');
	define('IDS_APP_ENVIRONMENT', 'development');
	
	//configuracion del include path
	set_include_path( 	get_include_path() . PS .
						APP_ROOT_PATH . DS . 'core' . PS .
						APP_ROOT_PATH . DS . 'apps'. PS .
						APP_ROOT_PATH . DS . 'lib'. PS .
						APP_ROOT_PATH . DS . 'lib' . DS . 'Models' . PS .
						APP_ROOT_PATH . DS . 'lib' . DS . 'Models' . DS . 'generated');

	//Extra Lib
	require(APP_ROOT_PATH . '/lib/General/Utils.php');
	require(APP_ROOT_PATH . '/lib/Excel/Excel.php');

	//autload para doctrine
	require(APP_ROOT_PATH . '/core/Doctrine/Doctrine.php');
	spl_autoload_register( array('Doctrine','autoload') );
	
	//autoload del framework
	require_once('IDS/Loader.php');
	spl_autoload_register( 'IDS_Loader::ClassLocator' );


	
	//inicializacion del factory y carga de configuracion
	IDS_Factory_Manager::Init( new IDS_Factory_Standard() );
	$factory	= IDS_Factory_Manager::GetFactory();
	$config		= $factory->GetConfig();
	
	ini_set('date.timezone', $config->Get('php.date.timezone') );
	
	//configuracion de doctrine
	$conn = Doctrine_Manager::connection(	'mysql://'.$config->Get('db.user').':'.$config->Get('db.pass').
                                            '@'.$config->Get('db.host').'/'.$config->Get('db.name'));
	//$conn->SetName('Main');
	
	$manager = Doctrine_Manager::getInstance();
	$manager->setAttribute( Doctrine::ATTR_DEFAULT_TABLE_CHARSET, $config->Get('doctrine.charset'));
    $manager->setAttribute( Doctrine::ATTR_DEFAULT_TABLE_COLLATE, $config->Get('doctrine.collate')); 
    $manager->setAttribute( Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
	$manager->setAttribute( Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE);
	$manager->setAttribute( Doctrine::ATTR_AUTOLOAD_TABLE_CLASSES, true);
	
	Doctrine_Core::setModelsDirectory( APP_ROOT_PATH . '/lib/Models' );
	
	//creacion de objetos basicos del framework
	$request	= $factory->CreateRequest();
	$response	= $factory->CreateResponse();
	$router		= $factory->CreateRouter();
	$dispatcher	= $factory->CreateDispatcher();
	$session	= $factory->GetSession();
	$front		= $factory->CreateFrontController($request, $response, $router, $dispatcher);
	
	$app		= ApplicationContext::GetInstance();
	$app->SetFronController( $front );
	
	$router->AddRoute( 'home', new IDS_Controller_Router_Route_Rewrite(
									'/:controller/:action',
									array(	'module' 		=> 'Backend' )));
	$router->AddRoute( 'login', new IDS_Controller_Router_Route_Rewrite(
								'/',
								array(	'module' => 'Backend', 'controller' => 'Default', 'action' => 'Login' )));
	
	//ejecucion del framework
	$front->Run();
		
	//echo 'MEMORIA: '.((memory_get_usage( true ) - $memStart)/1024/1024).' | TIEMPO: '.( microtime( true ) - $timeStart );
	//echo 'MEMORIA: '.((memory_get_peak_usage( true ))/1024/1024).' | TIEMPO: '.( microtime( true ) - $timeStart );
?>