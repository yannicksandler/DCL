<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Response_Http extends IDS_Response
{

	protected $_headers	= array();
	protected $_headersSended = false;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 
	 * @param name
	 */
	public function GetHeader($name)
	{
		if( $this->HeaderExists( $name ) )
		{
			return $this->_header[$name];
		}
		else
		{
			throw new IDS_Response_Exception( 'Header not found' );
		}
	}

	public function GetHeaders()
	{
		return $this->_headers;
	}
	
	public function Send()
	{
		if( !$this->HeadersSended() )
			$this->SendHeaders();
		
		parent::Send();
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function SetHeader($name, $value = '')
	{
		$this->_headers[$name]    = $value;
	}
	
	public function HeaderExists( $name )
	{
		return array_key_exists($name, $this->_headers);
	}
	
	public function UnsetHeader( $name )
	{
		if( $this->HeaderExists( $name ) )
		{
			unset( $this->_headers[$name] );
		}
		else
		{
			throw new IDS_Response_Exception('Header not found');
		}
	}
	
	public function UnsetHeaders()
	{
		unset( $this->_headers );
	}
	
	public function SendHeaders()
	{
		if( $this->HeadersSended() )
		{
			throw new IDS_Response_Exception( 'Headers already sended' );
		}
		
		foreach( $this->_headers as $name => $value )
		{
			header( $value ? $name.':'.$value : $name );
		}
		
		$this->_headersSended = true;
	}
	
	public function HeadersSended()
	{
		return $this->_headersSended;
	}

}
?>