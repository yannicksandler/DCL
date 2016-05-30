<?php
    class IDS_Factory_Manager
    {
        protected static $_factory;
        
        public static function Init( IDS_IFactory $factory )
        {
            if( isset(self::$_factory) )
            {
                throw new IDS_Factory_Exception('Factory manager already initialized');
            }
            
            self::$_factory = $factory;
        }
        
        public static function GetFactory()
        {
            
            if( !isset( self::$_factory ) )
            {
                throw new IDS_Factory_Exception('Cannot find factory, you must execute Init method first');
            }
            
            return self::$_factory;
        }
    }
?>