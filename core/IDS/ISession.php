<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
interface IDS_ISession
{	
	public function Commit();

	public static function Decode( $data );

	public function Destroy();

	public function Encode();

	/**
	 * 
	 * @param name
	 */
	public function Exists($name);

	/**
	 * 
	 * @param name
	 */
	public function Get($name);
	
	public function GetCacheExpiration();
	
	public function GetCacheLimiter();

	public function GetContext();

	public function GetCookieParams();

	public function GetId();

	public function IsStarted();

	/**
	 * 
	 * @param removeOldSession
	 */
	public function RegenerateId($removeOldSession);

	public function Reset();

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value);

	/**
	 * 
	 * @param var
	 */
	public function SetCacheExpiration( $value );

	public function SetCacheLimiter( $value );

	/**
	 * 
	 * @param name
	 */
	public function SetContext($name);

	/**
	 * 
	 * @param lifetime
	 * @param path
	 * @param domain
	 * @param secure
	 * @param httponly
	 */
	public function SetCookieParams($lifetime, $path, $domain, $secure, $httponly);

	public function Start();

}
?>