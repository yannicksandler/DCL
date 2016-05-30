<?php
    class IDS_Controller_Action_Helper_Auth implements IDS_Controller_Action_IHelper
    {
        private $_controller;
            
        public function __construct( IDS_Controller_IAction $controller  )
        {
            $this->_controller      = $controller;
        }
        
        /*
        */
        public function EventPostExecute()
        {
        }
    
        /*
        */
        public function EventPostInit()
        {
            
        }
    
        /*
        */
        public function GetDefaultPriority()
        {
            
        }
        
        /*
        */
        public function EventPreExecute()
        {
            
        }
    
        /*
        */
        public function EventPreInit()
        {
            
        }
    
        /*
        */
        public function GetController()
        {
            return $this->_controller;
        }
        
        /*
        */
        public function SetController( IDS_Controller_IAction $controller )
        {
            $this->_controller = $controller;
        }
        
        public function AuthSet( &$userData )
        {
            $this->GetController()->GetSession()->Set( 'CURRENT_AUTH_DATA', $userData );
        }
        
        public function AuthGet( $key = null )
        {
            if( isset( $key ) )
            {
                $data   = $this->GetController()->GetSession()->Get('CURRENT_AUTH_DATA');
                return $data[$key];
            }
            return $this->GetController()->GetSession()->Get('CURRENT_AUTH_DATA');
        }
        
        public function LoggedIn()
        {
            if( $this->AuthGet('LOGIN_OK') === true )
                return true;
            return false;
        }
            
        public function LogIn( $data = array(), $config = array() )
        {
            $qry    =   Doctrine::getTable($config['LOGIN_TABLE'])
                        ->createQuery()
                        ->addWhere($config['LOGIN_STATUS'].'=?', 1);
               
            foreach( $data as $key => $value )
            {
                $qry->addWhere($key.'=?', $value);
            }   
            $userData   =   $qry->FetchOne();    
              
            if( $userData )
            {
                if( $config['REMEMBER'] )    
                    $this->Remember();
                        
                $data   =   $userData->toArray();
                $data['LOGIN_OK']   =   true;
                $this->AuthSet( $data );
                return true;
            }
            return false;
        }
            
        public function Logout()
        {
            $this->GetController()->GetSession()->Reset();
        }
            
        public function Remember()
        {
            $session    = $this->GetController()->GetSession();
            $expireTime = 60*60*24*100;                                                                
            $session->SetCookie(session_name(), $session->GetCookie(session_name()), time()+$expireTime, "/");            
        }
            
        public function GeneratePassword()
        {
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
            
            srand((double)microtime()*1000000);
            
            $i = 0;
            $pass = '' ;
                
            while ($i <= 7)
            {
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $pass = $pass . $tmp;
                $i++;
            }
                
            return $pass;
        }
    }
?>