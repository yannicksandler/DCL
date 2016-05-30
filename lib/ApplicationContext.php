<?php
    class ApplicationContext implements IApplicationContext
    {
        protected static $_instance = null;
        
        protected $_frontController;
        protected $_factory;
        
        protected function __construct()
        {
            $this->SetFactory( IDS_Factory_Manager::GetFactory() );
        }
        
        public function GetFronController()
        {
            return $this->_frontController;
        }
        
        public function SetFronController( IDS_Controller_IFront $frontController )
        {
            $this->_frontController = $frontController;
        }
        
        public static function GetInstance()
        {
            if( is_null( self::$_instance  ) )
            {
                self::$_instance    = new self();
            }
                
            return  self::$_instance;
        }
        
        public function SetFactory( IDS_IFactory $factory )
        {
            $this->_factory = $factory;
            
        }
        
        public function GetFactory()
        {
            return $this->_factory;
        }
        
        public function GetSession()
        {
            return $this->_factory->GetSession();
        }
        
        public function GetCurrentUser()
        {
            return Classes_CurrentUser::GetInstance();
        }
        
        public function GetCurrentUserObject()
        {
            return Classes_CurrentUser::GetInstance()->GetUserObject();
        }
        
    }
?>