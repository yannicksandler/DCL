<?php
    class Classes_CurrentUser
    {   
        protected static $_instance     = null;
        protected $_factory             = null;
        
        protected function __construct()
        {
            $this->_factory    = IDS_Factory_Manager::GetFactory();
            $this->_session    = $this->_factory->GetSession();
        }     
        
        public static function GetInstance()
        {
            if( is_null( self::$_instance ) )
                self::$_instance = new self();
              
            return self::$_instance;
        }
        
        public function IsLoggedIn()
        {
            return  $this->_session->Get('current_user_login_ok') ? true : false;   
        }
        
        public function SetLoggedIn()
        {
            $this->_session->Set('current_user_login_ok', 1);
        }
        
        public function Logout()
        {
            $this->_session->Destroy();
        }
        
        public function CookieLogin()
        {   
            return $this->_session->Get('current_user_login_cookie') ? true: false;
        }
        
        public function GetData()
        {
            return $this->_session->Get('current_user_login_data');
        }
        
        public function GetUserObject()
        {
            $data    = $this->GetData();

            if($data)
            {
                if( array_key_exists( 'Id', $data ) )
                {
                    $user    = Doctrine::GetTable('Usuario')->Find( $data['Id'] );
                    
                    if( $user )
                        return $user;
                }
            }
            
            return null;
        }
        
        public function SetData( $data )
        {
            $this->_session->Set('current_user_login_data', $data);
        }
            
        public function GeneratePassword()
        {
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
            
            srand((double)microtime()*1000000);
                
            $i = 0;
            $pass = '' ;
                
            while ($i <= 7) {
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $pass = $pass . $tmp;
                $i++;
            }
            return $pass;
        }        
    }
?>