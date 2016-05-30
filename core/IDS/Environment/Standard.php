<?php
    class IDS_Environment_Standard
    {
        protected $_envValues = array();
        
        public function __construct( array $envValues )
        {
            $this->_envValues = $envValues;
        }
        
        public function Get( $name, $default = null )
        {            
            return isset( $this->_envValues[$name] ) ? $this->_envValues[$name] : $default;
        }
        
        public function Exists( $name )
        {
            return array_key_exists( $name, $this->_envValues );
        }
    }
?>