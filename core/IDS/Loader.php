<?php
    class IDS_Loader
    {
        public function LoadClass( $className, array $params = array() )
        {       
            $class  = $this->LoadReflectionClass( $className, $params );
            
            if( count( $params ) > 0 )
            {
                return $class->newInstanceArgs($params);
            }
                
            return $class->newInstance();
        }
        
        public static function ClassExists( $name, $autoload = true )
        {
            return class_exists( $name, $autoload );
        }
        
        public static function ClassLocator( $className )
        {
            include_once strtr( $className, '_', DIRECTORY_SEPARATOR ) . '.php';
        }
        
        public function LoadReflectionClass( $className, array $params = array() )
        {
            if( self::ClassExists( $className, true ) === true )
            {
                return new ReflectionClass($className);
            }
            
            throw new IDS_Loader_Exception( 'Cannot find class '.$className );

        }
    }
?>