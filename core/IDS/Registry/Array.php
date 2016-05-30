<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Registry_Array implements IDS_IRegistry
{
	private $_data = array();

	/**
	 * 
	 * @param name
	 */
	public function Exists($name)
	{
		return array_key_exists( $name, $this->_data );
	}

	/**
	 * 
	 * @param name
	 */
	public function Get($name, $default = null)
	{
		return isset( $this->_data[$name] ) ? $this->_data[$name] : $default;
	}
	
	public function GetAll()
	{
		return $this->_data;
	}

	/**
	 * 
	 * @param name
	 */
	public function Remove($name)
	{
		if( $this->Exists( $name ) )
			unset( $this->_data[$name] );
			
	}
	
	public function Reset()
	{
		$this->_data = array();
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value)
	{
		$this->_data[$name] = $value;
	}

}
?>