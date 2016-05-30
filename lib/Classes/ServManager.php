<?php
    class Classes_ServManager
    {
        private static $_instance;
        private $_lookup    = array();
        
        protected function __construct(){}
        
        protected function _lookupClass( $className )
        {
            if( !array_key_exists( $className, $this->_lookup ))
                $this->_lookup[$className]  = new $className();
                
            return $this->_lookup[$className];
        }
        
        public function GetInstance()
        {
            if( !isset( self::$_instance ) )
                self::$_instance    = new Classes_ServiceManager();
            
            return self::$_instance;
        }
        
        public function AlumnoProductoService()
        {
            return $this->_lookup( 'Classes_AlumnoProductoService' );
        }
    }
?>