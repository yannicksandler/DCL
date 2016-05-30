<?php
    interface IDS_IView
    {
        public function GetObject( $name = null);
        
        public function ObjectExists( $name );
        
        public function Param( $name = null );
        
        public function ParamExists($name);
        
        public function RemoveAllObjects();
        
        public function RemoveAllParams();
        
        public function RegisterObject( $name, object $object, $allowedMethods = array(),  $blockedMethods = array() );
        
        public function RemoveParam( $name );
        
        public function RemoveObject( $name );
        
        public function Reset();
        
        public function SetParam( $name, $value = null );
                
    }
?>