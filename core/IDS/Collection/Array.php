<?php
    class IDS_Collection_Array implements IteratorAggregate 
    {
        protected $_collection    = array();
        
        public function __construct( $data = array() )
        {
            $this->_collection = $data;
        }
        
        public function GetCollection()
        {
            return $this->_collection;
        }
        
        public function Get( $key = null, $default = null )
        {
            if( is_null($key) )
                return $this->_collection;
            else
                return isset( $this->_collection[$key] ) ? $this->_collection[$key] : $default;
        }
        
        public function getIterator() {
            return new ArrayIterator($this->_collection);
        }
        
        public function Exists( $key )
        {
            return array_key_exists( $key, $this->GetCollection() );
        }
        
        public function Set( $key, $value )
        {
            $this->_collection[$key] = $value;
        }
        
        public function Merge( array $data )
        {
            $this->_collection = array_merge( $this->_collection, $data );
        }
        
        public function Remove( $name )
        {
            unset( $this->_collection[$name] );
        }
        
        public function Reset()
        {
            $this->_collection = array();
        }
        
    }
?>