<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Request_Http extends IDS_Request
{

	protected $_paramsQuery;
	protected $_paramsPost;
	
	/**
	 * 
	 * @param params
	 * @param paramsQuery
	 * @param paramsPost    paramsPost
	 */
	public function __construct(array $params, array $paramsQuery, array $paramsPost)
	{
		parent::__construct($params);
		
		$this->_paramsQuery	= $paramsQuery;
		$this->_paramsPost	= $paramsPost;
		
		$this->_serverData 	= IDS_Factory_Manager::GetFactory()->GetServerData();
		$this->_envData 	= IDS_Factory_Manager::GetFactory()->GetEnvironmentData();
		
		$this->SetURI( $this->_serverData->Get('REQUEST_URI') );
	}

	public function __destruct()
	{
	}

	/**
	 * 
	 * @param name    name
	 */
	public function GetFile($name)
	{
		if( isset( $_FILES[$name] ) and !$_FILES[$name]['error'] )
		{
			return new IDS_Request_Http_File( $name );
		}
		/*else
		{
			throw new IDS_Request_Http_Exception( 'Cannot found file '.$name );
		}*/
		return false;
	}
	
	public function GetFileCount()
	{
		return count( $_FILES );
	}

	public function GetFiles()
	{
		return array_keys($_FILES);
	}
	
	public function GetEnvData()
	{
		return $this->_envData;
	}
	
	public function GetServerData()
	{
		return $this->_serverData;
	}

	public function IsAjax()
	{
		return (strtolower( $this->_serverData->Get('HTTP_X_REQUESTED_WITH')) == 'xmlhttprequest');
	}

	public function IsPost()
	{
		return (strtolower( $this->_serverData->Get('REQUEST_METHOD')) === 'post');
	}

	/**
	 * 
	 * @param name    name
	 */
	public function Param($name)
	{
		if( isset($this->_params) )
		{		
			if( array_key_exists($name, $this->_params) )
			{
				return $this->_params[$name];	
			}
		}
			
		return null;
	}

	public function Params()
	{
		return $this->_params;
	}

	/**
	 * 
	 * @param name    name
	 */
	public function Post($name)
	{
		if( isset($this->_paramsPost) )
		{
			if( array_key_exists($name, $this->_paramsPost) )
			{
				return $this->_paramsPost[$name];	
			}
		}
			
		return null;
	}

	public function Posts()
	{
		return $this->_paramsPost;
	}

	/**
	 * 
	 * @param name    name
	 */
	public function QueryParam($name)
	{
		if( isset($this->_paramsQuery) )
		{
			if( array_key_exists($name, $this->_paramsQuery) )
			{
				return $this->_paramsQuery[$name];	
			}
		}
			
		return null;
	}

	public function QueryParams()
	{
		return $this->_paramsQuery;
	}

	/**
	 * 
	 * @param name
	 * @param value    value
	 */
	public function SetPost($name, $value)
	{
		$this->_paramsPost[$name]	= $value;
	}

	/**
	 * 
	 * @param name
	 * @param value    value
	 */
	public function SetQueryParam($name, $value)
	{
		$this->_paramsQuery[$name]	= $value;
	}

}
?>