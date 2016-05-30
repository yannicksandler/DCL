<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
class IDS_Config_Ini implements IDS_IConfig
{

	protected $_file;
	protected $_loaded 	= false;
	protected $_section = '';
	protected $_data	= array();
	
	const GlobalSectionName = 'global';
	
	/**
	 * 
	 * @param file
	 */
	public function __construct($file = IDS_CONFIG_PATH, $section = IDS_APP_ENVIRONMENT)
	{
		$this->_file 	= $file;
		$this->_section	= $section;
	}

	/**
	 * 
	 * @param name
	 */
	public function Get($name = null, $default = null)
	{
		if( !$this->IsLoaded() )
			$this->Load();
		
		if( is_null( $name ) )
			return $this->_data;
		else
			return isset( $this->_data[$name] ) ? $this->_data[$name] : $default;
	}

	public function IsLoaded()
	{
		return $this->_loaded;
	}

	public function Load()
	{
		if( !(file_exists($this->_file) && is_readable($this->_file)) )
		{
			throw new IDS_Config_Exception(	'Cannot read configuration file at '.
											$this->_file );
		}
		
		$parsedIni = parse_ini_file( $this->_file, true );
		
		if( !$parsedIni )
			throw new IDS_Config_Exception( 'Cannot parse file '.$this->_file );
			
		if( array_key_exists( self::GlobalSectionName, $parsedIni) )
			$this->_data = array_merge( $this->_data, $parsedIni[self::GlobalSectionName] );
			
		if( array_key_exists( $this->_section, $parsedIni) )
			$this->_data = array_merge( $this->_data, $parsedIni[$this->_section] );
			
		$this->_loaded = true;
		
	}

	/**
	 * 
	 * @param name
	 * @param value
	 */
	public function Set($name, $value)
	{
	}

}
?>