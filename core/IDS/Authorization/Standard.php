<?php
    class IDS_Authorization_Standard implements IDS_IAuthorization
    {
        protected $_provider;
        
        public function __construct( IDS_Authorization_IProvider $provider )
        {
            $this->_provider    = $provider;
        }
        
        public function SetProvider( IDS_Authorization_IProvider $provider )
        {
            $this->_provider    = $provider;
        }
        
        public function GetProvider()
        {
            return $this->_provider;
        }
        
        public function LogIn()
        {
            if( $this->_provider->Authorize() )
            {
                return true;
            }
            return false;
        }
        
    }
?>