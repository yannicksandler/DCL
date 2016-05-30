<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_IFront
{
	/**
	 * 
	 * @param pluginClass
	 */
	public function GetPlugin($pluginClass);

	public function GetPlugins();

	public function GetRequest();

	public function GetResponse();

	public function GetRouter();

	/**
	 * 
	 * @param pluginClass
	 */
	public function PluginExists($pluginClass);

	public function Run();

	/**
	 * 
	 * @param dispatcher
	 */
	public function SetDispatcher(IDS_Controller_IDispatcher $dispatcher);

	/**
	 * 
	 * @param pluginClass
	 * @param priority
	 */
	public function SetPlugin($plugin, $alias, $priority = null);

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
	 * @param router
	 */
	public function SetRouter(IDS_Controller_IRouter $router);

	/**
	 * 
	 * @param pluginClass
	 */
	public function UnsetPlugin($pluginClass);

}
?>