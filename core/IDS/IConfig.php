<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
interface IDS_IConfig
{

	/**
	 * 
	 * @param name
	 */
	public function Get($name = null, $default = null);

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value);

}
?>