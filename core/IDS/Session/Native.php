<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Session_Native implements IDS_ISession
{
    protected $_context;
	
	public function Commit()
	{
		session_write_close();
	}

	public static function Decode( $data )
	{
		if(!is_string( $data ))
			throw new IDS_Session_Exception('Invalid parameter, string parameter expected');
			
		return session_decode( $data );
	}

	public function Destroy()
	{
		return session_destroy();
	}

	public function Encode()
	{
		return session_encode();
	}

	/**
	 * 
	 * @param name
	 */
	public function Exists($name)
	{
		return array_key_exists( $name, $_SESSION[$this->_context] );
	}

	/**
	 * 
	 * @param name
	 */
	public function Get($name)
	{
		if( isset( $_SESSION[$this->_context][$name] ) )
			return $_SESSION[$this->_context][$name];
	}
	
	public function GetCacheExpiration()
	{
		return session_cache_expire();
	}
	
	public function GetCacheLimiter()
	{
		return session_cache_limiter();
	}

	public function GetContext()
	{
		return $this->_context;
	}

	public function GetCookieParams()
	{
		return session_get_cookie_params();
	}

	public function GetId()
	{
		return session_id();
	}
	
	public function GetSession()
	{
		if( !$this->IsStarted() )
			$this->Start();
			
		return $_SESSION[$this->_context];
	}

	public function IsStarted()
	{
		return ( $this->GetId() ) ? true : false;
	}

	/**
	 * 
	 * @param removeOldSession
	 */
	public function RegenerateId($removeOldSession)
	{
		return session_regenerate_id( $removeOldSession );
	}
	
	public function Register( $varname )
	{
		
		$_SESSION[$this->_context][$varname] = $$varname;
	}

	public function Reset()
	{
		unset( $_SESSION[$this->_context] );
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value)
	{
		$_SESSION[$this->_context][$name] = $value;
	}

	/**
	 * 
	 * @param var
	 */
	public function SetCacheExpiration( $value )
	{
		if( $this->Started() )
                throw new IDS_Session_Exception('Cannot change cache expiration after session start');
				
		if( is_integer( $value ) )
		{
			return session_cache_expire( $value );
		}
		else
		{
			throw new IDS_Session_Exception('value must be an integer');
		}
	}

	public function SetCacheLimiter( $value )
	{
		if( is_string( $value ) )
		{
			return session_cache_limiter( $value );
		}
		else
		{
			throw new IDS_Session_Exception('cache limiter value must be a string');
		}
	}

	/**
	 * 
	 * @param name
	 */
	public function SetContext($name)
	{
		if( !is_string($name) )
		{
			throw new IDS_Session_Exception('Session context must be a string');
		}
		
		$this->_context = $name;
		
		if( !array_key_exists( $name, $_SESSION) )
		{
			$_SESSION[$this->_context] = array();
		}
	}

	/**
	 * 
	 * @param lifetime
	 * @param path
	 * @param domain
	 * @param secure
	 * @param httponly
	 */
	public function SetCookieParams($lifetime, $path, $domain, $secure, $httponly)
	{
		if( $this->Started() )
			throw new IDS_Session_Exception('Cannot alter session cookie parameters after session start');
			
		return session_set_cookie_params( $lifetime, $path, $domain, $secure, $httponly );
	}

	public function Start( $context = 'default' )
	{
		$this->SetContext( $context );
		
		if( $this->IsStarted() )
			return false;
		
		session_start();
		return true;
	}

}
?>