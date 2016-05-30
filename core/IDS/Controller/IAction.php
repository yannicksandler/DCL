<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_IAction
{

	public function DefaultAction();

	/**
	 * 
	 * @param helperClass
	 */
	public function GetHelper($helperClass);

	public function GetHelpers();

	public function GetRequest();

	public function GetResponse();
	
	public function GetSession();

	public function Init();
	
	public function RunAction( $actionName, array $params  = null );

	/**
	 * 
	 * @param helper
	 * @param priority
	 */
	public function SetHelper($helper, $priority = null);

	/**
	 * 
	 * @param request
	 */
	public function SetRequest(IDS_Request $request);

	/**
	 * 
	 * @param response
	 */
	public function SetResponse(IDS_Response $response);

	/**
	 * 
	 * @param helperClass
	 */
	public function RemoveHelper($helperClass);

}
?>