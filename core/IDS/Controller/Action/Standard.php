<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
class IDS_Controller_Action_Standard implements IDS_Controller_IAction
{

	private $_helperDirector;
	private $_request;
	private $_response;
	private $_factory;
	
	public function __construct( $request, $response, IDS_IFactory $factory = null )
	{
		$this->_request			= $request;
		$this->_response		= $response;
		
		if( $factory )
		{
			$this->SetFactory( $factory );
		}
		else
		{
			$this->SetFactory( IDS_Factory_Manager::GetFactory() );
		}
		
		$this->_helperDirector 	= new IDS_Controller_Action_HelperDirector( $this );
		
		$this->_helperDirector->EventPreInit();
		$this->Init();
		$this->_helperDirector->EventPostInit();
	}
	
	public function __get( $name )
	{
		return $this->GetHelper($name);
	}

	public function DefaultAction()
	{
	}
	
	public function GetConfig()
	{
		return $this->_factory->GetConfig();
	}
	
	public function GetFactory()
	{
		return $this->_factory;
	}

	/**
	 * 
	 * @param helperClass
	 */
	public function GetHelper( $name )
	{
		return $this->_helperDirector->GetHelper( $name );
	}

	public function GetHelpers()
	{
		return $this->_helperDirector->GetHelpers();
	}

	public function GetRequest()
	{
		return $this->_request;
	}

	public function GetResponse()
	{
		return $this->_response;
	}
	
	public function GetSession()
	{
		return $this->_factory->GetSession();
	}

	public function Init()
	{
	}
	
	public function RunAction( $actionName, array $params = null )
	{
		
		if( !method_exists($this, $actionName ) )
		{
			throw new IDS_Controller_Dispatcher_Exception(
						'Cannot find action '.$actionName.' in controller '.__CLASS__ );
		}
		
		$this->_helperDirector->EventPreExecute();
		
		$this->$actionName( $params );
		
		$this->_helperDirector->EventPostExecute();
	}

	public function SetFactory( IDS_Factory_Standard $factory )
	{
		$this->_factory	= $factory;
	}
	/**
	 * 
	 * @param helper
	 * @param priority
	 */
	public function SetHelper($helper, $alias = null, $priority = null)
	{		
		$this->_helperDirector->SetHelper( $helper, $alias, $priority );
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
	 * @param helperClass
	 */
	public function RemoveHelper( $name )
	{
		$this->_helperDirector->Remove( $name );
	}

}
?>