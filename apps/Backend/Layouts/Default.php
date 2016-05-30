<?php
    class Backend_Layouts_Default extends IDS_Layout_Abstract
    {
        public function DefaultLayout()
        {
            $this->BuildMenu();
            
            $this->SetTemplate('Backend/Layouts/Default.tpl');
        }
        
        public function ListLayout()
        {
            $this->BuildMenu();
             
            $this->SetTemplate('Backend/Layouts/List.tpl');
        }
        
        public function PopupLayout()
        {
        	$this->SetTemplate('Backend/Layouts/Popup.tpl');
        }
        
    	public function BlankLayout()
        {
        	$this->SetTemplate('Backend/Layouts/Blank.tpl');
        }
        
        public function BuildMenu()
        {
        	
            $ac         =   ApplicationContext::GetInstance();
            $factory    =   $ac->GetFactory();
            //$user       =   $ac->GetCurrentUserObject();
            $server     =   $factory->GetServerData();
            $view       =   $this->View();
            
            //$main       =   Doctrine::GetTable("Menu")->FindAll();
            //$activeMenu =   Doctrine::GetTable("MenuOption")->GetSelected($server->Get('REQUEST_URI'));
            $activeMenu =   Doctrine::GetTable("Menu")->GetSelected($server->Get('REQUEST_URI'));
            //print_r($activeMenu);
            
            /* controlar sesion de usuario */
            $a	=	new Classes_Session();
			$a->Session();
			
        	if($a->IsLoggedIn())
			{
				
				if( ! $a->HasAccess( $server->Get('REQUEST_URI') ))
				{
					header("Location: /?error=2");	
				}
				
				// tiene accceso, cargar perfil
				$view->SetParam("NombreUsuario", $a->GetUser()->Usuario);
				
				$menu	=	$a->GetUser()->UsuarioPerfil->UsuarioPerfilMenus;
			
	            $view->SetParam("Menu", $menu);
	            $view->SetParam("activeMenu",$activeMenu);
	            //var_dump($activeMenu->Id);
	            
			}
			else
			{
				header("Location: /?error=1");
			}

        }
    }
?>