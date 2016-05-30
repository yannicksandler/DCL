<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Controller_Dispatcher_Standard implements IDS_Controller_IDispatcher
{
	/**
	 * 
	 * @param request
	 * @param response
	 */
	
	protected $_controller = null;
	protected $_action = null;
	
	public function Dispatch(IDS_Request $request, IDS_Response $response)
	{
		$factory	= IDS_Factory_Manager::GetFactory();
		
		$module		= str_replace(' ', '', ucwords( str_replace( '-', ' ', $request->GetModule() ) ) );
		$controller	= str_replace(' ', '', ucwords( str_replace( '-', ' ', $request->GetController() ) ) ).'Controller';
		$action		= str_replace(' ', '', ucwords( str_replace( '-', ' ', $request->GetAction() ) ) ).'Action';
		
		$loader		= $factory->GetLoader();
		$config		= $factory->GetConfig();
		
		$className	= $module.'_Controllers_'.$controller;
		$class		= $loader->LoadClass( $className, array( $request, $response ) );
		
		if( !($class instanceof IDS_Controller_IAction) )
		{
			throw new IDS_Controller_Dispatcher_Exception(
						'Invalid controller class of type '.get_class( $class ).'
						controller class must implement IDS_Controller_IAction ', 500 );
		}
		
		$this->SetController( $class );
		$this->SetAction( $action );
		
	}
	
	public function Run( IDS_Response $response )
	{
		$this->GetController()->RunAction( $this->GetAction(), null );
		
		if( !$response->Sended() )
		{
			$response->Send();
		}
	}
	
	public function GetController()
	{
		return $this->_controller;
	}
	
	public function SetController( IDS_Controller_IAction $controller )
	{
		$this->_controller	= $controller;
	}
	
	public function GetAction()
	{
		return $this->_action;
	}
	
	public function SetAction(  $action )
	{
		$this->_action	= $action;
	}
}
?>