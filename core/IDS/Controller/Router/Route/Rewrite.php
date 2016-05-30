<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Controller_Router_Route_Rewrite implements IDS_Controller_Router_IRoute
{
	protected $_path;
	protected $_params;
	
	public function __construct( $path, array $params = array())
	{
		$this->SetPath( $path );
		
		$this->_params 	= $params;
	}
	
	/**
	 * 
	 * @param name
	 */
	public function GetParam($name, $default = null)
	{
		return isset( $this->_params[$name] ) ? $this->_params[$name] : $default;
	}

	public function GetParams()
	{
		return $this->_params;
	}

	public function GetPath()
	{
		return $this->_path;
	}
	
	public function Match( $uri )
	{
		$pattern	= str_replace( "/", "\/", $this->GetPath() );
		$pattern 	= preg_replace( "/\:([a-zA-Z0-9-_]+)/", "[a-zA-Z0-9-_]+", $pattern );
		$pattern 	= "/".$pattern."?/";

		return preg_match( $pattern, $uri );
	}
	
	public function Resolve( $uri )
	{
		$path  			= $this->GetPath();
		$returnParams	= $this->_params;
		
		$urlParts       = explode( '/', substr( $uri, 1 ) );

		if( substr($path, -1) == '/' && substr($path, 0, 1) == '/' )
		{
			$path    =	 substr( $path, 0, strlen( $path ) - 1 );
		}
		
		if( substr($uri, -1) == '/' && substr($uri, 0, 1) == '/' )
		{
			$uri    = substr( $uri, 0, strlen( $uri ) - 1 );
		}
		
		$routeSegments    = substr_count( $path, '/' );
		$urlSegments      = substr_count( $uri, '/' );
		
		for( $i = $routeSegments ; $i < $urlSegments ; $i += 2 )
		{
			if( $urlParts[$i] )
			{
				$returnParams[$urlParts[$i]] = isset($urlParts[$i+1]) ? $urlParts[$i+1] : null;
			}
		}
				
		$pathParts   = substr( $path, 1 );
		$pathParts   = explode( '/', $pathParts );
		
		for( $i = 0 ; $i < $routeSegments ; $i++ )
		{
			if( strpos( $pathParts[$i], ':' ) === 0 )
			{
				$returnParams[substr($pathParts[$i], 1)] = $urlParts[$i];
			}
		}
		
		return $returnParams;
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function SetParam( $name, $value)
	{
		$this->_params[$name] = $value;
	}
	
	public function SetPath( $path )
	{
		if( !is_string( $path ) )
			throw new IDS_Controller_Router_Route_Exception('path must be a string');
			
		$this->_path = $path;
	}

}
?>