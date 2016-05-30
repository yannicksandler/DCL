<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Request_Http_File
{
	private $_name;

	/**
	 * 
	 * @param name
	 */
	public function __construct($name)
	{
		if( !self::FileExists( $name ) )
			throw new IDS_Request_Http_Exception('File '.$name.' not defined');
			
		if( !self::IsUploaded($name) )
			throw new IDS_Request_Http_Exception('File '.$name.' was not uploaded');
			
		$this->_name = $name;
	}
	
	/**
	 * 
	 * @param name
	 */
	public static function FileExists($name)
	{
		if( array_key_exists( $name, $_FILES ))
			return true;
		else
			return false;
	}
	

	public function GetError()
	{
		return $_FILES[$this->_name]['error'];
	}
	
	public static function GetFiles()
	{
		return array_keys($_FILES);
	}

	public function GetName()
	{
		return $this->_name;
	}

	public function GetOriginalName()
	{
		return $_FILES[$this->_name]['name'];
	}

	public function GetSize()
	{
		return $_FILES[$this->_name]['size'];
	}

	public function GetTemporaryName()
	{
		return $_FILES[$this->_name]['tmp_name'];
	}

	public function GetType()
	{
		return $_FILES[$this->_name]['type'];
	}
	
	public static function IsUploaded( $name )
	{
		return is_uploaded_file( $_FILES[$name]['tmp_name'] );
	}
}
?>