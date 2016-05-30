<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
interface IDS_Controller_Router_IRoute
{

	/**
	 * 
	 * @param name
	 */
	public function GetParam($name, $default = null);

	public function GetParams();

	public function GetPath();
	
	public function Match( $uri );
	
	public function Resolve( $uri );

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function SetParam($name, $value);
	
	public function SetPath( $path );

}
?>