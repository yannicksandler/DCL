<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
interface IDS_Controller_Action_IHelper
{

	public function EventPostExecute();

	public function EventPostInit();

	public function EventPreExecute();

	public function EventPreInit();
	
	public function GetDefaultPriority();

}
?>