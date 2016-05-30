<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_IRouter
{

	/**
	 * 
	 * @param name
	 * @param route
	 */
	public function AddRoute($name, IDS_Controller_Router_IRoute $route);

	/**
	 * 
	 * @param name
	 */
	public function GetRoute($name);

	public function GetRoutes();

	/**
	 * 
	 * @param name
	 */
	public function RemoveRoute($name);

	public function RemoveRoutes();

	/**
	 * 
	 * @param request
	 */
	public function Route(IDS_Request $request);

	/**
	 * 
	 * @param name
	 */
	public function RouteExists($name);

}
?>