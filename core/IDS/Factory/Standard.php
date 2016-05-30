<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Factory_Standard implements IDS_IFactory
{
	protected $_serverDataInstance;
	protected $_environmentDataInstance;
	protected $_sessionInstance;
	protected $_registryInstance;
	protected $_configInstance;
	protected $_loaderInstance;

	public function CreateDispatcher()
	{
		return new IDS_Controller_Dispatcher_Standard();
	}

	public function CreateFrontController( 	IDS_Request $request,
											IDS_Response $response,
											IDS_Controller_IRouter $router,
											IDS_Controller_IDispatcher $dispatcher )
	{
		return new IDS_Controller_Front_Standard( $request, $response, $router, $dispatcher );
	}

	public function CreatePriorityStack()
	{
		return new IDS_PriorityStack();
	}

	public function CreateRequest()
	{
		return new IDS_Request_Http( $_REQUEST, $_GET, $_POST );
	}

	public function CreateResponse()
	{
		return new IDS_Response_Http();
	}

	public function CreateRoute( $path, array $params = array() )
	{
		return new IDS_Controller_Router_Route_Rewrite( $path, $params );
	}

	public function CreateRouter()
	{
		return new IDS_Controller_Router_Rewrite();
	}
	
	public function CreateView()
	{
		require_once 'Smarty/Smarty.class.php';
		
		$smarty	= new Smarty();
		$config	= $this->GetConfig();
		
		$templatePaths	= explode(',',$config->Get('smarty.template_dir'));
		$smarty->template_dir	= array();
		
		foreach(  $templatePaths as $path)
		{
			array_push($smarty->template_dir, APP_ROOT_PATH . $path);
		}
		
		$smarty->compile_dir 		= APP_ROOT_PATH . $config->Get('smarty.compile_dir');
		$smarty->config_dir 		= APP_ROOT_PATH . $config->Get('smarty.config_dir');
		$smarty->cache_dir 			= APP_ROOT_PATH . $config->Get('smarty.cache_dir');
		$smarty->compile_check		= APP_ROOT_PATH . $config->Get('smarty.compile_check');
		
		//$smarty->caching = true;
		//echo $smarty->cache_dir . '---'.$smarty->compile_dir . '-----' . $smarty->compile_check . '-----' . $smarty->config_dir;		
		return new IDS_View_Smarty( $smarty );
	}
	
	public function GetEnvironmentData()
	{
		if( !isset( $this->_environmentDataInstance ) )
			$this->_environmentDataInstance = new IDS_Environment_Standard( $_ENV );
			
		return $this->_environmentDataInstance;
	}
	
	public function GetServerData()
	{
		if( !isset( $this->_serverDataInstance ) )
			$this->_serverDataInstance = new IDS_Server_Standard( $_SERVER );
			
		return $this->_serverDataInstance;
	}

	public function GetConfig()
	{
		if( !isset( $this->_configInstance ) )
			$this->_configInstance = new IDS_Config_Ini();
			
		return $this->_configInstance;
	}

	public function GetRegistry()
	{
		if( !isset( $this->_registryInstance ) )
			$this->_registryInstance = new IDS_Registry_Array();
			
		return $this->_registryInstance;
	}

	public function GetSession()
	{
		if( !isset( $this->_sessionInstance ) )
			$this->_sessionInstance = new IDS_Session_Native();
			
		return $this->_sessionInstance;
	}
	
	public function GetLoader()
	{
		if( !isset( $this->_loaderInstance ) )
			$this->_loaderInstance = new IDS_Loader();
			
		return $this->_loaderInstance;
	}

}
?>