<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_IDispatcher
{

	/**
	 * 
	 * @param request
	 * @param response
	 */
	public function Dispatch(IDS_Request $request, IDS_Response $response);
	public function Run( IDS_Response $response );
	
}
?>