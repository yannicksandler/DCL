<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Request
{

	protected $_action		= 'Default';
	protected $_controller	= 'Default';
	protected $_module		= 'Default';
	protected $_params;
	protected $_uri;
	protected $_dispatched	= false;

	/**
	 * 
	 * @param params
	 */
	public function __construct(array $params)
	{
		$this->_params	= $params;
	}
	
	public function Dispatched()
	{
		return $this->_dispatched;
	}

	public function GetAction()
	{
		return $this->_action;
	}

	public function GetController()
	{
		return $this->_controller;
	}

	public function GetModule()
	{
		return $this->_module;
	}
	
	public function GetURI()
	{
		return $this->_uri;
	}

	/**
	 * 
	 * @param name
	 */
	public function Param($name)
	{
		if( array_key_exists($name, $this->_params) )
		{
			return $this->_params[$name];	
		}
	}

	public function Params()
	{
		return $this->_params;
	}

	/**
	 * 
	 * @param action
	 */
	public function SetAction($action)
	{
		if( !is_string( $action ) )
		{
			throw new IDS_Request_Exception('action must be an string');
		}
		
		$this->_action = $action;
	}

	/**
	 * 
	 * @param controller
	 */
	public function SetController($controller)
	{
		if( !is_string( $controller ) )
		{
			throw new IDS_Request_Exception('controller must be an string');
		}
		
		$this->_controller = $controller;
	}
	
	public function SetDispatched( $dispatch )
	{
		$this->_dispatched	= (bool)$dispatch;
	}

	/**
	 * 
	 * @param module
	 */
	public function SetModule($module)
	{
		if( !is_string( $module ) )
		{
			throw new IDS_Request_Exception('module must be an string');
		}
		
		$this->_module = $module;
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function SetParam($name, $value = null)
	{
		if( is_array( $name ) )
			$this->_params = array_merge( $name, $this->_params );
		else
			$this->_params[$name] = $value;
	}
	
	public function SetURI( $uri )
	{
		if( !is_string( $uri ) )
			throw new IDS_Request_Exception('URI must be a string');
			
		$this->_uri	= $uri;
	}

}
?>