<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Controller_Router_Rewrite implements IDS_Controller_IRouter
{
	protected $_routes;
	
	public function __construct()
	{
		$this->_routes	= array();
	}

	/**
	 * 
	 * @param name
	 * @param route
	 */
	public function AddRoute($name, IDS_Controller_Router_IRoute $route)
	{
		if( !is_string($name) && $name )
			throw new Exception( 'Route name must be a non empty string' );
			
		$this->_routes[$name]	= $route;
	}

	/**
	 * 
	 * @param name
	 */
	public function GetRoute($name)
	{
		if( !isset( $this->_routes[$name] ) )
			throw new IDS_Controller_Router_Exception(' Route '. $name.' not defined' );
		
		return $this->_routes[$name];
	}

	public function GetRoutes()
	{
		return $this->_routes;
	}

	/**
	 * 
	 * @param name
	 */
	public function RemoveRoute($name)
	{
		unset( $this->_routes[$name] );
	}

	public function RemoveRoutes()
	{
		$this->_routes = array();
	}

	/**
	 * 
	 * @param request
	 */
	public function Route( IDS_Request $request )
	{
		
		if( !count( $this->_routes ) )
			throw new IDS_Controller_Router_Exception('Empty routing table, you must add at lest one route');
			
		$requestURI 	= 	$request->GetURI();
			
		foreach( $this->_routes as $routeName => $route )
		{
			if( $route->Match( $requestURI ) )
			{
				$routeParams	= $route->Resolve( $requestURI );

				if( isset($routeParams['module']) )
					$request->SetModule( $routeParams['module'] );
		
				if( isset($routeParams['controller']) )
					$request->SetController( $routeParams['controller'] );
		
				if( isset($routeParams['action']) )
					$request->SetAction( $routeParams['action'] );
					
				$request->SetParam( $routeParams );
				
				return true;
			}
		}
		return false;
	}

	/**
	 * 
	 * @param name
	 */
	public function RouteExists($name)
	{
		return array_key_exists( $this->_routes[$name] );
	}

}
?>