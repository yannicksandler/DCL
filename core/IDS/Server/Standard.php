<?php
    class IDS_Server_Standard
    {
        protected $_serverValues = array();
        
        public function __construct( array $serverValues )
        {
            $this->_serverValues = $serverValues;
        }
        
        public function Get( $name, $default = null )
        {            
            return isset( $this->_serverValues[$name] ) ? $this->_serverValues[$name] : $default;
        }
        
        public function Exists( $name )
        {
            return array_key_exists( $name, $this->_serverValues );
        }
    }
?>