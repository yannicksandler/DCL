<?php
    class IDS_View_Standard implements IDS_IView
    {
        protected $_params    = array();
        protected $_objects   = array();
        
        public function GetObject( $name = null, $default = null )
        {
            if( is_null($name) )
            {
                return $this->_objects;
            }
            else
            {
                return isset($this->_objects[$name]) ? $this->_objects[$name] : $default;
            }
        }
        
        public function ObjectExists( $name )
        {
            return array_key_exists( $name, $this->_objects );
        }
        
        public function Param( $name = null, $default = null )
        {
            if( is_null($name) )
            {
                return $this->_params;
            }
            else
            {
                return isset( $this->_params[$name] ) ? $this->_params[$name]  : $default;
            }
        }
        
        public function ParamExists($name)
        {
            return array_key_exists( $name, $this->_params );
        }
        
        public function RemoveAllObjects()
        {
            $this->_objects = array();
        }
        
        public function RemoveAllParams()
        {
            $this->_params = array();
        }
        
        public function RegisterObject( $name, object $object )
        {
            if( is_array($name) )
            {
                $this->_objects = array_merge( $this->_objects, $name );
            }
            else
            {
                $this->_objects[$name]   = $object;
            }
        }
        
        public function RemoveParam( $name )
        {
            unset( $this->_params[$name] );
        }
        
        public function RemoveObject( $name = null )
        {
            unset( $this->_objects[$name] );
        }
        
        public function Reset()
        {
            $this->RemoveAllObjects();
            $this->RemoveAllParams();
        }
        
        public function SetParam( $name, $value = null )
        {
            if( is_array($name) )
            {
                $this->_params = array_merge( $this->_params, $name );
            }
            else
            {
                $this->_params[$name]   = $value;
            }
        }
        
        
    }
?>