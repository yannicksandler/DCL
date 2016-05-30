<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
interface IDS_IFactory
{

	public function CreateDispatcher();

	public function CreateFrontController( 	IDS_Request $request,
											IDS_Response $response,
											IDS_Controller_IRouter $router,
											IDS_Controller_IDispatcher $dispatcher );

	public function CreatePriorityStack();
	
	public function CreateRequest();

	public function CreateResponse();

	public function CreateRoute( $path, array $params = array() );

	public function CreateRouter();
	
	public function GetEnvironmentData();
	
	public function GetServerData();

	public function GetConfig();

	public function GetRegistry();

	public function GetSession();
	
	public function GetLoader();

}
?>