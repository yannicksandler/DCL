<?php
    class Backend_Controllers_DefaultController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function LoginAction()
        {
            $this->View->RenderLayout(false);
             
            $request    =   $this->GetRequest();
            $view       =   $this->View->View();
            $config     =   $this->GetConfig();
            
            $currentUser    = ApplicationContext::GetInstance()->GetCurrentUser();
            
            if( $currentUser->IsLoggedIn() )
            {
            	
                $this->GetResponse()->SetHeader('Location','/Default/Start');
                
            }
            
            
                
            if( $request->IsPost() )
            {
            	
                $username   = $request->Param('user');
                $password   = $request->Param('pass');
                
                $authProvider   = new IDS_Authorization_Provider_Doctrine( Doctrine::GetTable('Usuario') );
                $authProvider->addCondition( 'Usuario.Usuario', $username );
                $authProvider->addCondition( 'Usuario.Password', $password );
                
                $authorization  = new IDS_Authorization_Standard( $authProvider );
                
                if( $authorization->LogIn() )
                {
                    $currentUser->SetLoggedIn();
                    $currentUser->SetData( $authProvider->GetLoginData()->ToArray() );
                    
                    $data	=	$currentUser->GetData();
                    
                    /* clase que administra session */
                    $a	=	new Classes_Session();
                    $a->SetLoggedIn();
                    $a->SetUserId($data['Id']);
                    
                    //$t	=	new Classes_Trazabilidad();
			        //$c	=	"Perfil usuario: " . $_SERVER['HTTP_USER_AGENT'];
			        // parse user agent
			        //http://www.php.net/manual/es/function.get-browser.php
			        //$t->AddLog($c);
                    /* cambia la pagina de inicio dependiendo 
                     * el perfil, deberia hacer refactor, poco claro
                     */
                    $a->RedirigirPaginaInicio();
                    	
                    //return;
                }
                else
                {
                    $view->SetParam( 'errorMsg', 'Usuario o contrase&ntilde;a incorrectos, por favor vuelva a intentar' );
                }
            }
            
            $error	=	$request->Param("error");
            if(isset($error))
            {
            	if($error == 1)
            			$view->SetParam( 'errorMsg', 'Su sesion ha caducado o no ha iniciado la sesion. Puede haber estado 40 minutos sin actividad. Ingrese nuevamente' );
            			
            	if($error == 2)
            			$view->SetParam( 'errorMsg', 'Su sesion ha finalizado, no tiene acceso a la pagina solicitada' );
            }
            
            
        }
        
        public function StartAction()
        {
        	//$t	=	new Classes_Trazabilidad();
	        ///$c	=	"Consulta inicio Frontend";
	        //$t->AddLog($c);
	        
    	    $view       =   $this->View->View();        
            
            //$PacienteId     =   $this->GetRequest()->Param("PacienteId");
            //$ExamenTipoId     =   $this->GetRequest()->Param("ExamenTipoId");
            //$view->SetParam("editErrorMessage", 'Hubo un error al mostrar el examen. Es posible que el numero no exista.');
        	$view->SetParam ( 'varController', 'Default' );
    	
    	
    	$a	=	new Classes_Session();
		$a->Session();
		            
        if($a->GetUser()->Id)
        {
        	$usuario	= Doctrine::getTable('Usuario')->FindOneById($a->GetUser()->Id);
        	
        	if(is_object($usuario))
        	{
				//$request	=	$this->GetRequest ();
				//$params     =   $request->Params();
				
				//$p	=	$cliente->GetUltimasPrestaciones(5);
			//echo count($p);
			//var_dump($p);
				//$view->SetParam("UltimosMensajes", $usuario->UltimosMensajes());
				//$view->SetParam("UltimosMensajes", Doctrine::getTable('Mensaje')->FindAll());
				$view->SetParam("Usuario", $usuario);
        	}
        	else
        	{
        		echo 'error, no se ha encontrado el objeto cliente';
        	}
			
        }
    
        	
        }
        
        public function SalirAction()
        {
            //$currentUser    = ApplicationContext::GetInstance()->GetCurrentUser();
            //$currentUser->Logout();
            
            $a	=	new Classes_Session();
            $a->Logout();
                
            $this->View->RenderLayout(false);
                
            $this->GetResponse()->SetHeader('Location','/');
        }
    }
?>