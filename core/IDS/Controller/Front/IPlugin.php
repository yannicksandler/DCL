<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_Front_IPlugin
{

	public function EventPostDispatch();

	public function EventPostDispatchLoop();
	
	public function EventPostRoute();

	public function EventPreDispatch();

	public function EventPreDispatchLoop();
	
	public function EventPreRoute();

}
?>