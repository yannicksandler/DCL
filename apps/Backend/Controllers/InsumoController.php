<?php
    class Backend_Controllers_InsumoController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function ListPendientesDePagoAction() {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            $layout = $this->View->LayoutView ();
            $this->View->SetViewTemplate('Backend/Insumo/List.tpl');
            
            $layout->SetParam ( 'titleFile', 'Backend/Insumo/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/Insumo/Record.tpl' );
            $layout->SetParam ( 'sectionTitle', 'Insumos elegidos sin orden de compra (Previsiones)' );
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'Insumo' );
            $layout->SetParam ( 'varAction', 'ListPendientesDePago' );
            $layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/Insumo/FilterBox.tpl' );
            
            //$search = $this->GetRequest()->Param('search');
            //$layout->SetParam ( 'search', $search );
            $proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
            $layout->SetParam("ArrayProveedores", $proveedores);
            
            /*
             obtener parametros de busqueda
            */
            $NombreProveedor  =   urldecode($this->GetRequest()->Param('ProveedorNombre'));
            $NombreCliente  =   urldecode($this->GetRequest()->Param('ClienteNombre'));
            $estadoOrdenId  =   $this->GetRequest()->Param('EstadoOrdenTrabajoId');
            $OrdenDeCompraId  =   $this->GetRequest()->Param('OrdenDeCompraId');
            $FechaDesdeSearch  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHastaSearch  =   $this->GetRequest()->Param('FechaHasta');
            //$Pagado  =   $this->GetRequest()->Param('Pagado');
            $OrdenDeTrabajoId  =   $this->GetRequest()->Param('OrdenDeTrabajoId');
            
            
            $return = array ();
            $filters = array();
           
            
            $filters['NombreProveedor']	=	$NombreProveedor;
            $filters['NombreCliente']	=	$NombreCliente;
            $filters['OrdenDeCompraId']	=	$OrdenDeCompraId;
            $filters['OrdenEstadoId']	=	$estadoOrdenId;
            $filters['FechaDesde']	=	$FechaDesdeSearch;
            $filters['FechaHasta']	=	$FechaHastaSearch;
            //$filters['Pendientes']	=	$Pendientes;
            $filters['OrdenDeTrabajoId']	=	$OrdenDeTrabajoId;
            
            //Previsiones: insumos elegidos de OTs cuyo estado sea Aprobado en adelante
            // y no tenga OC
            $insumos	=	Doctrine::GetTable ( 'Insumo' )->Previsiones($filters);
            $insumos->orderBy('i.OrdenId DESC');
           	$layout->SetParam ( 'Cantidad', count($insumos) );
           	//$layout->SetParam ( 'Resumen', Doctrine::GetTable ( 'Insumo' )->GetResumenPendientesDePago($filters) );				            				
            				
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'Insumo' ),
                                        $insumos,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'Nombre' ),
                                        $this->View->LayoutView () );
            
            /* set params */
            $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
			$layout->SetParam("EstadosOrden", $tblp->FindAll());
            
            $layout->SetParam ( 'EstadoId', $estadoOrdenId );
            $layout->SetParam ( 'ProveedorNombre', $NombreProveedor );
            $layout->SetParam ( 'ClienteNombre', $NombreCliente );
            $layout->SetParam ( 'OrdenDeCompraId', $OrdenDeCompraId );
            $layout->SetParam ( 'FechaDesde', $FechaDesdeSearch ); //str_replace("_", "/", $FechaDesdeSearch)
            $layout->SetParam ( 'FechaHasta', $FechaHastaSearch ); //str_replace("_", "/", $FechaHastaSearch)
            //$layout->SetParam ( 'Pagado', $Pagado );
            $layout->SetParam ( 'OrdenDeTrabajoId', $OrdenDeTrabajoId );
            
            $layout->SetParam ( 'CantidadEncontrados', count($insumos ));
            /*
            if(isset($FechaDesdeSearch) or isset($FechaHastaSearch))
            {
                $totalDesdeHasta    =   Doctrine::GetTable ( 'Insumo' )->Total($NombreProveedor, $estadoOrdenId, $OrdenDeCompraId, $FechaDesdeSearch, $FechaHastaSearch, $Pagado)->fetchOne();
                //print_r($totalDesdeHasta);
                $layout->SetParam ( 'TotalDesdeHasta', round($totalDesdeHasta->Total) );
            }*/
            
            
        }
        /*
        private function getInsumos($NombreProveedor, $estadoOrdenId, $OrdenDeCompraId, $FechaDesde, $FechaHasta, $Pagado)
        {
            
            $insumosQuery   =   Doctrine::GetTable ( 'Insumo' )->GetElegidos();
            
            
            if(isset($FechaDesde) and ($FechaDesde != 'Fecha desde'))
            {
                $FechaDesde = str_replace("_", "/", $FechaDesde);
                $dateHelper = new Classes_DateHelper();
                //echo $dateHelper->fromViewFormat($FechaDesde);
            
                $insumosQuery->innerJoin('Insumo.OrdenDeCompra oc')
                            ->andWhere('oc.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
            
            if(isset($FechaHasta) and ($FechaHasta != 'Fecha hasta'))
            {
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();
                
                if(!(isset($FechaDesde)))
                {
                    $insumosQuery->innerJoin('Insumo.OrdenDeCompra oc');
                }

                $insumosQuery->andWhere('oc.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
            
            if(isset($NombreProveedor) and ($NombreProveedor != 'Nombre_proveedor') )
            {
                
                //var_dump($NombreProveedor);
                $NombreProveedor = str_replace("_", " ", $NombreProveedor);
                //echo $NombreProveedor;
                $insumosQuery->innerJoin('Insumo.Proveedor p')
                            ->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
                
                
            }
            
        	if( ($Pagado == 'S' ) or ($Pagado == 'N') )
            {
                
                
                if($Pagado == 'S')
                {
                	$insumosQuery
                            ->andWhere('ocOrden.Pagado = ?', 'S');
                }
                else
            	{
                	$insumosQuery
                            //->andWhere('ocOrden.Pagado != ?', 'S')
                            ->andWhere('ISNULL(o.Pagado)');
                            
                            //echo $insumosQuery->getSqlQuery();
                           
                }
                
                
                
            }
            
            if(is_numeric($estadoOrdenId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->innerJoin('Insumo.Orden o')
                            ->andWhere('o.EstadoId = ?', $estadoOrdenId);
                
                
            }
            
            
            if(is_numeric($OrdenDeCompraId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->andWhere('Insumo.OrdenDeCompraId = ?', $OrdenDeCompraId);
                
            }
            //echo $insumosQuery->getSqlQuery();
            return $insumosQuery;
        }
          */  
            
        public function EditAction()
        {
        	try
        	{
	        	$this->View->RenderLayout(false);
	        	
	            $this->SetHelper('IDS_Controller_Action_Helper_Edit', 'Edit');
	                
	            $view       =   $this->View->View();
	            $return     =   array();
	            $request    =   $this->GetRequest();
	            
	            $ordenId = $this->GetRequest()->Param('Orden');
				$EsFlete = $this->GetRequest()->Param('EsFlete');
				$EsManoDeObra = $this->GetRequest()->Param('EsManoDeObra');
				$EsComercializacion = $this->GetRequest()->Param('EsComercializacion');
				// set view params
				if(($EsFlete == 'SI') and isset($EsFlete))
				{
					$view->SetParam("EsFlete", $EsFlete);
				}
				
				if(isset($EsManoDeObra) and ($EsManoDeObra == 'SI'))
				{
					$view->SetParam("EsManoDeObra", $EsManoDeObra);
				}
				
				if(isset($EsComercializacion) and ($EsComercializacion == 'SI'))
				{
					$view->SetParam("EsComercializacion", $EsComercializacion);
				}
				// autocomplete
				$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
				$view->SetParam("ArrayProveedores", $proveedores);
				
				$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
				$view->SetParam("Proveedores", $tblp->FindAll());
				
				if (isset($ordenId) and is_numeric($ordenId))
				{
					//echo 'entro orden';
					$orden	= Doctrine::getTable('OrdenDeTrabajo')->FindOneById($ordenId);
					if(is_object($orden))
					{
	                
					$this->Edit->ProcessFormEdit(   Doctrine::GetTable('Insumo'),//nombre del modelo
													$this->GetRequest()->Param("data"),
													$return,
													null,
													$view
												);
	
					if( $request->IsPost() and !array_key_exists('editErrorMessage',$return) )
			        {
					    $insumo = $orden->GetInsumoById($return['data']->Id);
					    
					    if($insumo->EsComercializacion == 'SI')
					    {
					    	$insumo->GenerarOrdenDeCompra();
					    	$insumo->SetEntregado();
					    }
					    
					    $msg = 'Insumo guardado correctamente. ';
					    $view->SetParam("editSuccessMessage", $msg);
			        }
					$view->SetParam("Orden", $orden);
					
					}
					else
						$view->SetParam("editErrorMessage", 'La orden de trabajo ingresada no existe. Cierre la ventana e intente nuevamente');
				}
				else
				{
					$view->SetParam("editErrorMessage", 'Los parametros ingresados no son correctos. Intente nuevamente');
				}
			}
			catch (Exception $e) {
				//echo 'Hubo un error al obtener los insumos de la orden';
				$view->SetParam("deleteErrorMessage", 'Error al guardar el insumo. '.$e->getMessage());
			}
            
        }
        
        public function ListEntregasProduccionAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$this->View->SetViewTemplate('Backend/Insumo/ListEntregasProduccion/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Insumo/ListEntregasProduccion/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Insumo/ListEntregasProduccion/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Entregas pendientes a produccion' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Insumo' );
		$layout->SetParam ( 'varAction', 'ListEntregasProduccion' );
		$layout->SetParam ( 'notAdd', true );
        $layout->SetParam ( 'filterBox', 'Backend/Insumo/ListEntregasProduccion/FilterBox.tpl' );
        
        $proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
		$layout->SetParam("ArrayProveedores", $proveedores);
			
        /*
        obtener parametros de busqueda
       */
       $filtrosForm  =   $this->GetRequest()->Param('filters');
       $OrdenId  =   $this->GetRequest()->Param('OrdenId');
      
       $filters	=	array();
       $filters	=	$filtrosForm;
       if(isset($OrdenId))
       	$filters['OrdenDeTrabajoId'] = $OrdenId;
       		
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('Insumo')->GetEntregasPendientesProduccion($filters);
		$layout->SetParam ( 'CantidadEncontrados', count($ordenQuery->execute()) );
		
		$this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDeTrabajo' ),
                                  $ordenQuery,
                                  $this->GetRequest ()->Params (),
                                  $return,
                                  array ('updateColumn' => 'Status',
                                                  'updateField' => 'selectId',
                                                  'deleteField' => 'selectId',
                                                  'searchField' => 'OrdenDeTrabajo.Cliente.Nombre' ),
                                                    $this->View->LayoutView () );
        
        
        $layout->SetParam("filters", $filters);
        /*
        $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
		$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
		$layout->SetParam("Prioridades", $tblpri->FindAll());
          */
        $mensaje  =   $this->GetRequest()->Param('Mensaje');
        if(isset($mensaje))
        {
        	if($mensaje == 1)
        		$layout->SetParam("updateSuccessMessage", 'Insumo modificado como entregado correctamente');
        }                                          
	}
	
	public function SetEntregadoAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();

        try
        {
	
		    $InsumoId    = $this->GetRequest()->Param('id');
		    $Produccion    = $this->GetRequest()->Param('Produccion');
		    $insumo		= Doctrine::getTable('Insumo')->FindOneById( $InsumoId );
		    
		    if( is_object($insumo) )
		    {
	            	$insumo->SetEntregado();
	            	$view->SetParam("updateSuccessMessage", 'Insumo entregado');
	            	//echo 'redirigir a lista y avisar';
	            	if(isset($Produccion) and ($Produccion == 'true'))
	            	{
		            	$url	=	'/Insumo/ListEntregasProduccion/OrdenId/'. $insumo->OrdenId . '/Mensaje/1';
			        	$this->GetResponse()->SetHeader("Location", $url);
	            	}
	        }
        }
        catch (Exception $e) {
        	//echo 'Hubo un error al obtener los insumos de la orden';
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al marcar el insumo como entregado. '.$e->getMessage());
        }

    }
	
        
   }
?>