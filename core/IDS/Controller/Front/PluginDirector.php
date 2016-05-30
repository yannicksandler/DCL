<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Controller_Front_PluginDirector implements IDS_Controller_Front_IPlugin
{

	protected $_front;
	protected $_loader;
	
	private $_pluginStack	= 	array();
	
	public function __construct( IDS_Controller_IFront $front )
	{
		$factory			= IDS_Factory_Manager::GetFactory();
		
		$this->_front		= $front;
		$this->_pluginStack	= $factory->CreatePriorityStack();
		$this->_loader		= $factory->GetLoader();
	}

	public function EventPostDispatch()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPostDispatch();
		}
	}

	public function EventPostDispatchLoop()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPostDispatchLoop();
		}
	}
	
	public function EventPostRoute()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPostRoute();
		}
	}

	public function EventPreDispatch()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPreDispatch();
		}
	}

	public function EventPreDispatchLoop()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPreDispatchLoop();
		}
	}
	
	public function EventPreRoute()
	{
		$plugins 	= 	$this->GetPlugins();
		foreach( $plugins as $key => $plugin )
		{
			$plugin->EventPreRoute();
		}		
	}
	
	public function GetFrontController()
	{
		return $this->_front;
	}

	/**
	 * 
	 * @param name
	 */
	public function GetPlugin($name)
	{
		return $this->_pluginStack->GetByName( $name );
	}

	public function GetPlugins()
	{
		return $this->_pluginStack->GetByPriority();
	}

	/**
	 * 
	 * @param pluginClass
	 */
	public function PluginExists($pluginClass)
	{
		return $this->_pluginStack->Exists( $pluginClass );
	}
	
	public function SetFrontController( IDS_Controller_IFront $front )
	{
		$this->_front	= $front;
	}

	/**
	 * 
	 * @param pluginClass
	 * @param priority
	 */
	public function SetPlugin( $plugin, $alias, $priority = null)
	{	
		if( !is_string( $plugin ) )
			throw new IDS_Controller_Front_Exception('First parameter must be a string');
			
		$pluginObject = $this->_loader->LoadClass( $plugin, array( $this->GetFrontController() ) );
		
		if( !($pluginObject instanceof IDS_Controller_Front_IPlugin) )
			throw new IDS_Controller_Front_Exception('Invalid object type, plugin object type must be IDS_Controller_Front_IPlugin');
		
		return $this->_pluginStack->Set( $pluginObject, $alias, $pluginObject->GetDefaultPriority() );
	}

	/**
	 * 
	 * @param pluginClass
	 */
	public function UnsetPlugin($pluginClass)
	{
		$this->_helperStack->Remove( $pluginClass );
	}
}
?>