<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
class IDS_Controller_Action_HelperDirector
{
	private $_helperStack;
	private $_controller;
	private $_loader;
	
	public function __construct( IDS_Controller_IAction $controller )
	{
		$factory			= IDS_Factory_Manager::GetFactory();
		$this->_controller 	= $controller;
		$this->_helperStack	= $factory->CreatePriorityStack();
		$this->_loader		= $factory->GetLoader();
	}

	public function EventPostExecute()
	{
		foreach( $this->_helperStack as $helper )
		{
			$helper->EventPostExecute();
		}
	}

	public function EventPostInit()
	{
		foreach( $this->_helperStack as $helper )
		{
			$helper->EventPostInit();
		}
	}

	public function EventPreExecute()
	{
		foreach( $this->_helperStack as $helper )
		{
			$helper->EventPreExecute();
		}
	}

	public function EventPreInit()
	{
		foreach( $this->_helperStack as $helper )
		{
			$helper->EventPreInit();
		}
	}
	
	public function GetController()
	{
		return $this->_controller;
	}

	/**
	 * 
	 * @param helperClass
	 */
	public function GetHelper($name, $priority = null)
	{
		return $this->_helperStack->GetByName($name);
	}

	public function GetHelpers()
	{
		return $this->_helperStack->GetByPriority();
	}
	
	public function SetController( IDS_Controller_IAction $controller )
	{
		$this->_controller = $controller;
	}

	/**
	 * 
	 * @param helper
	 * @param priority
	 */
	public function SetHelper( $helper, $alias, $priority = null)
	{	
		if( !is_string( $helper ) )
			throw new IDS_Controller_Action_Exception('First parameter must be a string');
			
		$helperObject = $this->_loader->LoadClass( $helper, array( $this->GetController() ) );
		return $this->_helperStack->Set( $helperObject, $alias, $helperObject->GetDefaultPriority() );
	}

	/**
	 * 
	 * @param helperClass
	 */
	public function RemoveHelper( $name )
	{
		$this->_helperStack->Remove( $name );
	}

}
?>