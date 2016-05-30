<?php
class Backend_Controllers_OrdenCompraController extends IDS_Controller_Action_Standard {
    
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
	    
    public function GenerarOrdenAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        { 
	
            $InsumoId    = $this->GetRequest()->Param('InsumoId');
            
            $insumo		= Doctrine::getTable('Insumo')->FindOneById( $InsumoId );
            
            if(!is_object($insumo))
            {
				$view->SetParam("editErrorMessage", 'No se pudo generar la orden de compra. '.
                                                'Es posible que el insumo no exista.');
            }
			else
			{
					
	            if( $insumo->HasOrdenDeCompra() )
	            {
	                $view->SetParam("Insumo", $insumo);
	                $view->SetParam("OrdenDeCompra", $insumo->OrdenDeCompra);
	            }
	            else
	            {
	                // si el insumo esta elegido
	                if($insumo->IsElegido())
	                {
	                    $insumo->GenerarOrdenDeCompra();
	                    $view->SetParam("Insumo", $insumo);
	                    $view->SetParam("OrdenDeCompra", $insumo->OrdenDeCompra);
	                }
	                else
	                {
	                    $view->SetParam("Insumo", $insumo);
	                    $view->SetParam("editErrorMessage", 'No se pudo generar la orden de compra. '.
	                                             'Es posible que el insumo no este elegido.');
	                }
	            }
			}
	
            	
        }
        catch (Exception $e) {
        	$view->SetParam("Proveedor", $insumo->Proveedor);
        	$view->SetParam("editErrorMessage",$e->getMessage());
        }

    }
    
        public function EditAction()
        {
        	$this->View->RenderLayout(false);
        	
            $this->SetHelper('IDS_Controller_Action_Helper_Edit', 'Edit');
                
            $view       =   $this->View->View();
            $return     =   array();
            
            //$InsumoId    = $this->GetRequest()->Param('InsumoId');
            //$insumo		= Doctrine::getTable('Insumo')->FindOneById( $InsumoId );
            $OrdenDeCompraId    = $this->GetRequest()->Param('id');
            $OrdenDeCompra		= Doctrine::getTable('OrdenDeCompra')->FindOneById( $OrdenDeCompraId );
            $insumo	=	$OrdenDeCompra->GetOneInsumo();
			if(!is_object($insumo))
				return 'El insumo no esta asociado';
					
			if ($insumo->HasOrdenDeCompra())
			{	
                
				$this->Edit->ProcessFormEdit(   Doctrine::GetTable('OrdenDeCompra'),
												$this->GetRequest()->Param("data"),
												$return,
												null,
												$view
											);
										
				
											
				$view->SetParam("Insumo", $insumo);
				$view->SetParam("OrdenDeCompra", $OrdenDeCompra);	
			}
			else
			{
				//echo 'no entro orden';
				header('Location: /Insumo/List');
			}
            
        }
        
        public function ListAction() {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/OrdenCompra/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/OrdenCompra/Record.tpl' );
            
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'OrdenCompra' );
            $layout->SetParam ( 'varAction', 'List' );
            $layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/OrdenCompra/FilterBox.tpl' );
            
            $proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
            $layout->SetParam("ArrayProveedores", $proveedores);
            /*
             obtener parametros de busqueda
            */
            $NombreProveedor  =   $this->GetRequest()->Param('NombreProveedor');
            $OrdenDeCompraId  =   $this->GetRequest()->Param('OrdenDeCompraId');
            $OrdenDePagoId  =   $this->GetRequest()->Param('OrdenDePagoId');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ;
            /* -pendientes 
             * -si no tienen Pagado=N (puede tener OP con pago parcial)
             * -no anuladas
             */
            $Pendientes  =   $this->GetRequest()->Param('Pendientes'); 
            
            $return = array ();
            $filters	=	array();
            
            $filters['NombreProveedor']	=	$NombreProveedor;
            $filters['OrdenDeCompraId']	=	$OrdenDeCompraId;
            $filters['OrdenDePagoId']	=	$OrdenDePagoId;
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            $filters['Pendientes']	=	$Pendientes;
            
            if($Pendientes == 'SI')
            {
            	$layout->SetParam ( 'sectionTitle', 'Ordenes de Compra pendientes de pago' );
            	$ordenesDeCompra	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetPendientesDePago($filters);
            	//$layout->SetParam ( 'Cantidad', Doctrine::GetTable ( 'OrdenDeCompra' )->GetCantidadPendientesDePago($filters) );
            	$layout->SetParam ( 'Cantidad', count($ordenesDeCompra) );
            }
            else
            {
            	$layout->SetParam ( 'sectionTitle', 'Listado de Ordenes de Compra' );
            	$ordenesDeCompra	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetByFilter($filters);
            	$layout->SetParam ( 'Cantidad', count($ordenesDeCompra) );
            }
            
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDeCompra' ),
                                        $ordenesDeCompra,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'Nombre' ),
                                        $this->View->LayoutView () );
            
            /* set params */
            
           	
            if($NombreProveedor != '' and $NombreProveedor != 'Nombre proveedor')
            	$layout->SetParam ( 'NombreProveedor', str_replace(" ", "_", $NombreProveedor) );
            if(is_numeric($OrdenDeCompraId))
            	$layout->SetParam ( 'OrdenDeCompraId', $OrdenDeCompraId );
            if(is_numeric($OrdenDePagoId))
            	$layout->SetParam ( 'OrdenDePagoId', $OrdenDePagoId );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            //$layout->SetParam ( 'Pagado', $Pagado );
            if(isset($Pendientes))
            	$layout->SetParam ( 'Pendientes', $Pendientes );
            
            
        }
        
    public function AnularAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();

        try
        { 
	
            $OrdenDeCompraId    = $this->GetRequest()->Param('id');
            
            $OrdenDeCompra		= Doctrine::getTable('OrdenDeCompra')->FindOneById( $OrdenDeCompraId );
            
            if(!is_object($OrdenDeCompra))
            {
				$view->SetParam("editErrorMessage", 'La orden de compra buscada no existe. ');
            }
			else
			{
				if($OrdenDeCompra->HasOrdenDePago())
					$url	=	'/Orden/GetInsumos/Orden/'.$OrdenDeCompra->GetOrdenDeTrabajo()->Id.'/Mensaje/1';
				else
				{
	            	$OrdenDeCompra->Anular();
	            	$url	=	'/Orden/GetInsumos/Orden/'.$OrdenDeCompra->GetOrdenDeTrabajo()->Id;
				}
				
	            $this->GetResponse()->SetHeader('Location', $url);
			}
			
					
			
	
            	
        }
        catch (Exception $e) {
        		$view->SetParam("editErrorMessage", 'Hubo un error anular la orden de compra. '. $e->getMessage());
        }

    }
        

}
?>