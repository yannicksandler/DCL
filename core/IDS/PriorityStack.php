<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_PriorityStack implements IteratorAggregate
{

	private $_nextFreePriority 	= 1;
	private $_stackByName		= array();
	private $_stackByPriority	= array();
	

	/**
	 * 
	 * @param name
	 */
	public function GetByName($name = null, $default = null)
	{
		if( is_null ($name))
		{
			return $this->_stackByName;
		}
		else
		{
			return isset( $this->_stackByName[$name] ) ? $this->_stackByName[$name] : $default; 
		}
	}
	
	/**
	 * 
	 * @param priority
	 */
	public function GetByPriority($priority = null, $default = null)
	{
		if( is_null($priority)  )
		{
			return $this->_stackByPriority;
		}
		else
		{
			return isset( $this->_stackByPriority[$priority] ) ? $this->_stackByPriority[$priority] : $default; 
		}
	}
	
	public function getIterator()
	{
		return new ArrayIterator( $this->_stackByPriority );
	}

	public function GetNextFreeHighPriority( $index = null )
	{
		if( $index === null )
			$startIndex	= $this->_nextFreePriority;
			
		$priorities = array_keys( $this->_stackByPriority );
		
		while( in_array( $startIndex, $priorities)  )
			$startIndex++;
		
		return $startIndex;
		
	}

	public function GetNextFreeLowPriority( $index = null )
	{
		if( $index === null )
			$startIndex	= $this->_nextFreePriority;
			
		$priorities = array_keys( $this->_stackByPriority );
		
		while( in_array( $startIndex, $priorities)  )
			$startIndex--;
		
		return $startIndex;
	}
	
	public function GetLowestPriority()
	{
		return min( $this->GetPriorities() );
	}
	
	public function GetHighestPriority()
	{
		return max( $this->GetPriorities() );
	}
	
	public function GetPriorities()
	{
		return array_keys( $this->_stackByPriority );
	}

	/**
	 * 
	 * @param name
	 */
	public function Exists( $identifier )
	{
		if( is_string( $identifier ) )
			return array_key_exists( $identifier, $this->_stackByName );
		else if( is_integer( $identifier ) )
			return array_key_exists( $identifier, $this->_stackByPriority );
		else
			throw new Exception( '$identifier must be a string or an integer' );
	}
	
	
	/**
	 * 
	 * @param object
	 * @param name
	 */
	public function Set($object, $name = null, $priority = null)
	{
		if( $name === null )
		{
			if( is_object( $object ) )
				$name	= get_class( $object );
			else
				throw new IDS_Exception( '	You need to specify the $name parameters
											if the element to be stored is not an object' );
		}
		
		if( $priority === null )
			$priority = $this->GetNextFreeHighPriority();
			
			
		$this->_stackByName[$name] 			= $object;
		$this->_stackByPriority[$priority] 	= $object;
		
		return $object;
	}

	/**
	 * 
	 * @param object
	 * @param priority
	 */
	public function Remove($identifier)
	{
		if( $this->Exists( $identifier ) )
		{
			if( is_string( $identifier ) )
			{
				$identifierName		= $identifier;
				$identifierPriority	= array_search( $this->_stackByName[$identifierName], $this->_stackByPriority );
			}
			else
			{
				$identifierPriority	= $identifier;
				$identifierName		= array_search( $this->_stackByPriority[$identifierPriority], $this->_stackByName );
			}
			
			unset( $this->_stackByName[$identifierName] );
			unset( $this->_stackByPriority[$identifierPriority]	 );
		}
	}

}
?>