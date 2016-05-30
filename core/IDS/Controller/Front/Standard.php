<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Controller_Front_Standard implements IDS_Controller_IFront
{

	protected $_dispatcher;
	protected $_pluginDirector;
	protected $_request;
	protected $_response;
	protected $_router;

	/**
	 * 
	 * @param request
	 * @param response
	 * @param router
	 * @param dispatcher
	 */
	public function __construct(IDS_Request $request, IDS_Response $response, IDS_Controller_IRouter $router, IDS_Controller_IDispatcher $dispatcher)
	{
		$this->_request 	= $request;
		$this->_response 	= $response;
		$this->_router		= $router;
		$this->_dispatcher	= $dispatcher;
		
		$this->_pluginDirector = new IDS_Controller_Front_PluginDirector( $this );
	}

	public function GetDispatcher()
	{
		return $this->_dispatcher;
	}

	/**
	 * 
	 * @param pluginClass
	 */
	public function GetPlugin($pluginClass)
	{
		return $this->_pluginDirector->GetPlugin($pluginClass);
	}

	public function GetPlugins()
	{
		return $this->_pluginDirector->GetPlugins();
	}

	public function GetRequest()
	{
		return $this->_request;
	}

	public function GetResponse()
	{
		return $this->_response;
	}

	public function GetRouter()
	{
		return $this->_router;
	}

	/**
	 * 
	 * @param pluginClass
	 */
	public function PluginExists($pluginClass)
	{
		return $this->_pluginDirector->PluginExists($pluginClass);
	}

	public function Run()
	{
		$dispatcher = $this->_dispatcher;
		$router		= $this->_router;
		$request	= $this->GetRequest();
		
		$this->_pluginDirector->EventPreDispatchLoop();
		
		try
		{
			do
			{
				$this->_pluginDirector->EventPreRoute();
				$routed	= $router->Route( $request );
				$this->_pluginDirector->EventPostRoute();
				
				if( $routed )
				{
					$this->_pluginDirector->EventPreDispatch();
					
					$dispatcher->Dispatch( $request, $this->GetResponse() );
					
					$this->_pluginDirector->EventPostDispatch();
					
					$dispatcher->Run( $this->GetResponse() );
				}
				else
				{
					throw new IDS_Controller_Front_Exception(	'Cannot find route for this request URI: '. $request->GetURI(),
																404
															);
				}
				
				$request->SetDispatched( true );
				
			}
			while( !$request->Dispatched() );
		}
		catch( Exception $e )
		{
			$config	= IDS_Factory_Manager::GetFactory()->GetConfig();
			if( (bool) $config->Get('ids.throw_exceptions') )
			{
				throw $e;
			}
			else
			{
				//hacer algo
			}
		}
		
		$this->_pluginDirector->EventPostDispatchLoop();
	}

	/**
	 * 
	 * @param dispatcher
	 */
	public function SetDispatcher(IDS_Controller_IDispatcher $dispatcher)
	{
		$this->_dispatcher	= $dispatcher;
	}

	/**
	 * 
	 * @param pluginClass
	 * @param priority
	 */
	public function SetPlugin($plugin, $alias, $priority = null)
	{
		return $this->_pluginDirector->SetPlugin($plugin, $alias, $priority);
	}

	/**
	 * 
	 * @param request
	 */
	public function SetRequest(IDS_Request $request)
	{
		$this->_request = $request;
	}

	/**
	 * 
	 * @param response
	 */
	public function SetResponse(IDS_Response $response)
	{
		$this->_response = $response;
	}

	/**
	 * 
	 * @param router
	 */
	public function SetRouter(IDS_Controller_IRouter $router)
	{
		$this->_router = $router;
	}

	/**
	 * 
	 * @param pluginClass
	 */
	public function UnsetPlugin($pluginClass)
	{
		return $this->_pluginDirector->UnsetPlugin($pluginClass);
	}

}
?>