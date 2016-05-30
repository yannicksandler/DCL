<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
interface IDS_IRegistry
{

	/**
	 * 
	 * @param name
	 */
	public function Exists($name);

	/**
	 * 
	 * @param name
	 */
	public function Get($name, $default = null);
	
	public function GetAll();

	/**
	 * 
	 * @param name
	 */
	public function Remove($name);
	
	public function Reset();

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value);

}
?>