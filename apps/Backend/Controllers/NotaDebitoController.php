<?php
    class Backend_Controllers_NotaDebitoController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function ListAction() {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/NotaDebito/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/NotaDebito/Record.tpl' );
            $layout->SetParam ( 'sectionTitle', 'Notas de debito' );
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'NotaDebito' );
            $layout->SetParam ( 'varAction', 'List' );
            //$layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            //$layout->SetParam ( 'filterBox', 'Backend/OrdenPago/FilterBox.tpl' );
            
            $proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
			$layout->SetParam("ArrayProveedores", $proveedores);
			            /*
             obtener parametros de busqueda
            */
            $ProveedorId  =   $this->GetRequest()->Param('ProveedorId');
            $OrdenDePagoId  =   $this->GetRequest()->Param('OrdenDePagoId');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ; 
            
            $return = array ();
            $filters	=	array();
            
            $filters['ProveedorId']	=	$ProveedorId;
            $filters['OrdenDePagoId']	=	$OrdenDePagoId;
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            
            $ordenesDePago	=	Doctrine::GetTable ( 'NotaDebito' )->GetByFilter($filters);
            $layout->SetParam ( 'Cantidad', count($ordenesDePago) );
            				
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'NotaDebito' ),
                                        $ordenesDePago,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'NotaDebito.Cliente.Nombre' ),
                                        $this->View->LayoutView () );
            
            /* set params */
                                        
            if(is_numeric($ProveedorId))
            {
            	$layout->SetParam ( 'ProveedorId', $ProveedorId );
            }
            if(is_numeric($OrdenDePagoId))
            	$layout->SetParam ( 'OrdenDePagoId', $OrdenDePagoId );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            //$layout->SetParam ( 'Pagado', $Pagado );
            
           	$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
			$layout->SetParam("Proveedores", $tblp->FindAll());
            
            
    }
    
    public function EditAction() {
    	$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
    	
    	$view = $this->View->View ();
    	$return = array ();
    	
    	$request	=	$this->GetRequest ();
    	$id	=	$request->Param("id");
    	
    	$clientes	=	Doctrine::getTable('Cliente')->FindAllArray();
    	$view->SetParam("ArrayClientes", $clientes);
    	
    	$cliente	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
    	$view->SetParam("Clientes", $cliente->FindAll());
    	
    	$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
    	$view->SetParam("TiposDeIva", $iva->FindAll());
    	
    	$data	=	$request->Param ( "data" );
    	// si es post y no esta seteado el id
    	if ($request->IsPost())
    	{
    		if(!is_numeric($data['Id']))
    		{
    			$nd	=	new NotaDebito();
    			
    			$nc	=	$nd->Create($data);
    			$data['Id']		=	$nc->Id;
    	
    		}
    		//else
    			//			{
    		//			$Credito->Update($data);
    		//	}
    		$view->SetParam("data", $data);
    	}
    	
    	if(isset($id) and is_numeric($id))
    	{
    		$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'NotaDebito' ), //nombre del modelo
    				$data, $return, null, $view );
    	
    		//$view->SetParam("data", $return['data']);
    	}
    	//else
    	//echo 'La factura ingresada no existe';
    	//$view->SetParam ( 'View', $ResumenView);
    	
    	if(isset($clienteId))
    	{
    		$view->SetParam("ClienteId", $clienteId);
    	}
    	
    }
      
    
}
?>