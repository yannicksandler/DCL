<?php
    class Classes_GrafoNavegacion
    {   
    	private $controller;
    	
    	public function __construct(IDS_Controller_Action_Standard $controller)
        {
			  $this->controller	=	$controller;
        }
        
        public function GoToFacturasDeCompraPendientes()
        {
	        $url	=	'/FacturaCompra/List/order/Fecha_DESC';
	        	
	        $this->controller->GetResponse()->SetHeader('Location', $url);
        }
    }
?>