<?php
class Backend_Controllers_OrdenController extends IDS_Controller_Action_Standard {
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
	
	
	public function ListAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Ordenes de trabajo' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'List' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/FilterBox.tpl' );
        
        
        //$search = $this->GetRequest()->Param('search');
        //$layout->SetParam ( 'search', $search );
        
        /*
        obtener parametros de busqueda
       */
       //$NombreCliente  =   urldecode($this->GetRequest()->Param('NombreCliente'));
       $NombreCliente  =   $this->GetRequest()->Param('NombreCliente');
       $estadoOrdenId  =   $this->GetRequest()->Param('EstadoOrdenTrabajoId');
       $OrdenDeTrabajoId  =   $this->GetRequest()->Param('OrdenDeTrabajoId');
       $PrioridadId  =   $this->GetRequest()->Param('PrioridadId');
       $FechaCambio  =   $this->GetRequest()->Param('FechaCambio');
       $FacturaId  =   $this->GetRequest()->Param('FacturaId');
       
       // al cambiar una prioridad vuelve al listado, sirve para aviso en pantalla
        $SetPrioridad  =   $this->GetRequest()->Param('SetPrioridad');
        $order  =   $this->GetRequest()->Param('order');
        if(isset($order))
        	$order	=	true;
        else
        	$order	=	false;
		
		$return = array ();
		$filters = array();
		if(isset($FacturaId))
			$filters['FacturaId'] = $FacturaId;
			
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->filter($NombreCliente, $estadoOrdenId, $OrdenDeTrabajoId, $PrioridadId, $order,$FechaCambio, $filters);
		
		$this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDeTrabajo' ),
                                  $ordenQuery,
                                  $this->GetRequest ()->Params (),
                                  $return,
                                  array ('updateColumn' => 'Status',
                                                  'updateField' => 'selectId',
                                                  'deleteField' => 'selectId',
                                                  'searchField' => 'OrdenDeTrabajo.Cliente.Nombre' ),
                                                    $this->View->LayoutView () );
        
        
        $this->SetParams($layout, $NombreCliente, $estadoOrdenId, $OrdenDeTrabajoId, $SetPrioridad, $PrioridadId,$FechaCambio);
	}
    
    private function SetParams($layout, $NombreCliente, $estadoOrdenId, $OrdenDeTrabajoId, $SetPrioridad, $PrioridadId,$FechaCambio)
    {
        if($NombreCliente != 'Nombre cliente')
            $layout->SetParam("NombreCliente", $NombreCliente);
            
        if(is_numeric($estadoOrdenId) and ($estadoOrdenId != ''))
        {
        	
            $layout->SetParam("OrdenEstadoId", $estadoOrdenId);
            //$layout->SetParam("EstadoId", $estadoOrdenId);
        }
        
    	if(is_numeric($PrioridadId))
        {
        	
            $layout->SetParam("SelectedPrioridadId", $PrioridadId);
        }
        
        if(isset($SetPrioridad))
        {
        	if($SetPrioridad == 'true')
        	{
        		$layout->SetParam("updateSuccessMessage", 'Prioridad modificada con exito');
        	}
        	else
        	{
        		$layout->SetParam("updateErrorMessage", 'La prioridad no pudo modificarse. Intente de nuevo');
        	}
			    	
        }
            
        if(is_numeric($OrdenDeTrabajoId))
            $layout->SetParam("OrdenDeTrabajoId", $OrdenDeTrabajoId);
            
        if(isset($FechaCambio))
        	$layout->SetParam("FechaCambio", $FechaCambio);
            
        /* set params */
            $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
			$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
			$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
			$layout->SetParam("Prioridades", $tblpri->FindAll());
			
    }
	
	public function EditAction() {
		
		try
		{
		
			$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
			
			$view = $this->View->View ();
			$return = array ();
			$request	=	$this->GetRequest ();
			/* set view params */
			$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
			$view->SetParam("Clientes", $tblp->FindAll());
	                
			$view->SetParam ( "Estados", Doctrine::GetTable ( "OrdenEstado" )->FindAll () );
			
			$prioridades	=	Doctrine::getTable('Prioridad')->FindAll();
			$view->SetParam("Prioridades", $prioridades);
			
	        $data = $this->GetRequest ()->Param ( "data" );
			$ordenId = $this->GetRequest()->Param('id');
			$popup = $this->GetRequest()->Param('popup');
			
			$a	=	new Classes_Session();
			$a->Session();
			
			if($a->IsLoggedIn() and $a->GetUser()->IsPerfilAdministrador())
			{
				$view->SetParam("IsPerfilAdministrador", true);
			}
			
			if($a->IsLoggedIn() and $a->GetUser()->IsPerfilVentas())
			{
				$view->SetParam("IsPerfilVentas", true);
			}
			
	
			if(is_numeric($ordenId) or is_numeric($data['Id']))
			{
				if(isset($data['Id']))
			        $orden	= Doctrine::getTable('OrdenDeTrabajo')->FindOneById($data['Id']);
			    else
					$orden	= Doctrine::getTable('OrdenDeTrabajo')->FindOneById($ordenId);
				
				if(is_object($orden))
				{
					$view->SetParam("Insumos", $orden->Insumos);
					$view->SetParam("HistorialEstados", $orden->OrdenEstadoHistorial);
					
					if( $request->IsPost() )
			        {
				        if(isset($popup))
						{
							$view->SetParam("popupsubmit", $popup);
							
						}	
						
			        	$view->SetParam("data", $data);
			        		
						$mgr = new Classes_EstadosManager($orden);
						if(!$mgr->IsEstadoAnulado($data))
						{
	        				$mgr->ControlarCambiosDeEstado();
						}
						/*
						 * 2012-07-06
						 
						$data['EstadoId'] = 5;
						var_dump($data);
						if($mgr->IsEstadoSinEmpezar())
						{
							$url	=	'/Orden/Edit/id/' . $orden->Id;
							echo 'si';
							$data['EstadoId'] = null;
							$this->GetResponse()->SetHeader('Location', $url);
						}
						*/
	        			/*
	        			 * requerimiento 2011-11-27
	        			 * -una Orden cambia a cotizado cuando agrego
	        			 * la fecha estimada de la orden de trabajo (proyecto)
	        			 */
	        			/*
	        			if($mgr->HasChangeFechaEstimada($data))
	        			{
	        				$mgr->SetEstadoCotizado();
	        				$data['EstadoId'] = NULL;
	        			}
	        			*/
			        }
					
				}
	         
	            //var_dump($costoInsumos);
			} /* end if */
			
				$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'OrdenDeTrabajo' ), //nombre del modelo
						$data, 
						$return, null, $view );
		
		
        
		
		}
        catch (Exception $e) {
        	
        	$view->SetParam("editErrorMessage", 'Error al guardar la orden de trabajo. ' . $e->getMessage());
        }
	
	}
	
    public function GetInsumosAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
	
	    $ordenId    = $this->GetRequest()->Param('Orden');
		$insumoId    = $this->GetRequest()->Param('Insumo');
		$action    = $this->GetRequest()->Param('Accion');
	
	    $orden		= Doctrine::getTable('OrdenDeTrabajo')->FindOneById( $ordenId );
	    
	    
	    if( $ordenId && $insumoId && $action )
	    {
            if( $action  == 'del' )
            {
                if(!$orden->BorrarInsumo( $insumoId ))
                {
                // no se puede borrar si tiene orden de compra generada
                //advertir
                	$view->SetParam("deleteErrorMessage", 'No se puede borrar el insumo si tiene orden de compra generada');
                }
                else
                {
                	$view->SetParam("successMessage", 'Insumo eliminado con exito');
                }
            }
            else {
                if( $action == 'add' )
                {
                    /**
                     * no se usa porque se agrega un registro con un popup
                     * url = /Insumo/Edit
                     */
					$view->SetParam("successMessage", 'Insumo agregado con exito');
                }
            }	
        }
        
        $mensaje    = $this->GetRequest()->Param('Mensaje');
        if($mensaje == 1)
        	$view->SetParam("deleteErrorMessage", 'No se puede anular una orden de compra que tenga una orden de pago generada');

        /* listar insumos de la orden */
        if(is_object($orden))
        {
            
            //$costoInsumos   =   $orden->GetCosto()->FetchOne();
            
            $view->SetParam("OrdenId", $orden->Id);
            $view->SetParam("Insumos", $orden->GetInsumosVarios()->execute());
            $view->SetParam("Fletes", $orden->GetFletes()->execute());
            $view->SetParam("ManoDeObra", $orden->GetManoDeObra()->execute());
            $view->SetParam("Comercializaciones", $orden->GetComercializacion()->execute());
            
            $a	=	new Classes_Session();
			$a->Session();
			// solo mostrar gastos de comercializacion cuando es perfil Administrativo o produccion
            if($a->IsLoggedIn() and ($a->GetNombrePerfil()=='Administrativo' or $a->GetNombrePerfil()=='Produccion'))
			{
				$view->SetParam("MostrarInsumosComercializacion", false);
			}
			else
			{
				$view->SetParam("MostrarInsumosComercializacion", true);
			}
			
            
            //$view->SetParam("CostoTotalInsumos", $costoInsumos);
            //$view->SetParam("CostoTotalFlete", $orden->GetCostoFlete()->FetchOne());
            //$view->SetParam("CostoTotalManoDeObra", $orden->GetCostoManoDeObra()->FetchOne());
            $view->SetParam("Resumen", $orden->GetResumen());
        }
        else
        	echo 'Excepcion: la orden de trabajo no existe';		
            	
        }
        catch (Exception $e) {
        	//echo 'Hubo un error al obtener los insumos de la orden';
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener los insumos de la orden. '.$e->getMessage());
        }

    }

    public function SetPrioridadAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
		
		    $ordenId    = $this->GetRequest()->Param('OrdenId');
			$PrioridadId    = $this->GetRequest()->Param('PrioridadId');
			/* ventas es usado para redirigir a otra pantalla */
			$Ventas    = $this->GetRequest()->Param('Ventas');
		
			if(!is_numeric($ordenId))
			{
				$url	=	'/Orden/List/order/Id_DESC/SetPrioridad/false';
		        $this->GetResponse()->SetHeader("Location", $url);
			}
			
			//$p	=	new Prioridad();
			//$p>IsPrioridad();			
			if(!is_numeric($PrioridadId))
			{
				$url	=	'/Orden/List/order/PrioridadId_DESC/SetPrioridad/false';
		        $this->GetResponse()->SetHeader("Location", $url);
			}
			
		    $orden		= Doctrine::getTable('OrdenDeTrabajo')->FindOneById( $ordenId );
	
	        if(is_object($orden))
	        {
	        	$orden->PrioridadId	=	$PrioridadId;
	        	$orden->save();
	        	var_dump($PrioridadId);
	        	if($orden->SetPrioridad($PrioridadId))
	        	{
	            	$view->SetParam("updateSuccessMessage", 'Prioridad modificada con exito');

	            	if(isset($Ventas))
	            	{
	            		$url	=	'/Orden/ListVentas/SetPrioridad/true';
	            	}
	            	else
	            		$url	=	'/Orden/List/order/PrioridadId_DESC/SetPrioridad/true';
	            	
		            
		            $this->GetResponse()->SetHeader("Location", $url);
	        	}
	        	else
	        	{
		        	if(isset($Ventas))
	            	{
	            		$url	=	'/Orden/ListVentas/SetPrioridad/false';
	            	}
	            	else
	            		$url	=	'/Orden/List/order/PrioridadId_DESC/SetPrioridad/false';
			        
			        $this->GetResponse()->SetHeader("Location", $url);
	        	}
	        }
	        else		
		    {	
		        $url	=	'/Orden/List/order/Id_DESC/SetPrioridad/false';
		        $this->GetResponse()->SetHeader("Location", $url);
	        }
        }
        catch (Exception $e) {
        	echo 'Hubo un error al cambiar el estado de la orden de trabajo';
        }

    }
    
    public function ListVentasAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		$this->View->SetViewTemplate('Backend/Orden/ListVentas/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/ListVentas/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/ListVentas/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Resumen de Ordenes de trabajo para ventas' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'ListVentas' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/ListVentas/FilterBox.tpl' );
        
        /*
        obtener parametros de busqueda
       */
        $request	=	$this->GetRequest();
        $FacturaId  =   $this->GetRequest()->Param('FacturaId');
        $filtrosForm  =   $this->GetRequest()->Param('filters');
        $NombreCliente  =   $this->GetRequest()->Param('NombreCliente');
       $filters	=	array();
       $filters	=	$filtrosForm;
       if(isset($FacturaId))
			$filters['FacturaId'] = $FacturaId;
       
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetVentas($filters);
		
		$this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDeTrabajo' ),
                                  $ordenQuery,
                                  $this->GetRequest ()->Params (),
                                  $return,
                                  array ('updateColumn' => 'Status',
                                                  'updateField' => 'selectId',
                                                  'deleteField' => 'selectId' ),
                                                    $this->View->LayoutView () );
        
        $layout->SetParam("filters", $filters);
        $layout->SetParam("Resumen", Doctrine::getTable('OrdenDeTrabajo')->GetTotales($filters));
        
        $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
		$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
		$layout->SetParam("Prioridades", $tblpri->FindAll());

		$SetPrioridad  =   $this->GetRequest()->Param('SetPrioridad');
		
		if( $request->IsPost() )
		{
			if($filtrosForm['NombreCliente'] != 'Nombre cliente')
				$layout->SetParam("NombreCliente", $filtrosForm['NombreCliente']);
		}
		else 
		{
			if($NombreCliente != 'Nombre cliente')
				$layout->SetParam("NombreCliente", $NombreCliente);
		}
       
		if(isset($SetPrioridad))
        {
        	if($SetPrioridad == 'true')
        	{
        		$layout->SetParam("updateSuccessMessage", 'Prioridad modificada con exito');
        	}
        	else
        	{
        		$layout->SetParam("updateErrorMessage", 'La prioridad no pudo modificarse. Intente de nuevo');
        	}
			    	
        }
        
	}
    
	public function ListCotizacionesAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$this->View->SetViewTemplate('Backend/Orden/ListCotizaciones/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/ListCotizaciones/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/ListCotizaciones/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Ordenes de trabajo para cotizar' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'ListCotizaciones' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/ListCotizaciones/FilterBox.tpl' );
        $layout->SetParam ( 'notAdd', 'true' );
        /*
        obtener parametros de busqueda
       */
       $filtrosForm  =   $this->GetRequest()->Param('filters');
       $order  =   $this->GetRequest()->Param('order');
        
       $filters	=	array();
       $filters	=	$filtrosForm;
       if(isset($order))
        	$filters['order']	=	$order;
       		
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetSinCotizar($filters);
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
        
        $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
		$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
		$layout->SetParam("Prioridades", $tblpri->FindAll());
                                                    
	}

	public function ListProduccionAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$this->View->SetViewTemplate('Backend/Orden/ListProduccion/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/ListProduccion/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/ListProduccion/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Ordenes de trabajo en produccion' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'ListProduccion' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/ListProduccion/FilterBox.tpl' );
        $layout->SetParam ( 'notAdd', 'true' );
        /*
        obtener parametros de busqueda
       */
       $filtrosForm  =   $this->GetRequest()->Param('filters');
       $filters	=	array();
       $filters	=	$filtrosForm;
       		
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetEnProduccion($filters);
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
	}
	
	public function ListPreproduccionAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$this->View->SetViewTemplate('Backend/Orden/ListPreproduccion/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/ListPreproduccion/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/ListPreproduccion/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Ordenes de trabajo pendientes para produccion' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'ListPreproduccion' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/ListPreproduccion/FilterBox.tpl' );
        $layout->SetParam ( 'notAdd', 'true' );
        /*
        obtener parametros de busqueda
       */
       $filtrosForm  =   $this->GetRequest()->Param('filters');
       $order  =   $this->GetRequest()->Param('order');
        
       $filters	=	array();
       $filters	=	$filtrosForm;
       if(isset($order))
        	$filters['order']	=	$order;
       		
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetPreproduccion($filters);
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
        
        $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
		$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
		$layout->SetParam("Prioridades", $tblpri->FindAll());
		
		$mensaje  =   $this->GetRequest()->Param('Mensaje');
		
		if($mensaje == 1)
		{	
			$layout->SetParam("SuccessMessage", 'La orden de trabajo fue cambiada a estado Aprobado');
		}
                                                    
	}
	
	public function ListSinFacturarAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$this->View->SetViewTemplate('Backend/Orden/ListSinFacturar/List.tpl');
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Orden/ListSinFacturar/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Orden/ListSinFacturar/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Ordenes de trabajo pendientes para facturar' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Orden' );
		$layout->SetParam ( 'varAction', 'ListSinFacturar' );
        $layout->SetParam ( 'filterBox', 'Backend/Orden/ListSinFacturar/FilterBox.tpl' );
        $layout->SetParam ( 'notAdd', 'true' );
        /*
        obtener parametros de busqueda
       */
       $filtrosForm  =   $this->GetRequest()->Param('filters');
       $order  =   $this->GetRequest()->Param('order');
        
       $filters	=	array();
       $filters	=	$filtrosForm;
       if(isset($order))
        	$filters['order']	=	$order;
       		
		$return = array ();
		
		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetOrdenesDeTrabajoSinFacturar($filters);
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
        
        $tblp	= new IDS_Doctrine_Table( Doctrine::getTable('OrdenEstado') );
		$layout->SetParam("EstadosOrden", $tblp->FindAll());
			
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Prioridad') );
		$layout->SetParam("Prioridades", $tblpri->FindAll());
		
		$mensaje  =   $this->GetRequest()->Param('Mensaje');
		
		if($mensaje == 1)
		{	
			$layout->SetParam("SuccessMessage", 'La orden de trabajo fue cambiada a estado Aprobado');
		}
                                                    
	}

    public function CrearOrdenFicticiaAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
        $this->View->SetViewTemplate('Backend/Orden/SetPrioridad.tpl');    

        try
        {
		
		    $ordenId    = $this->GetRequest()->Param('OrdenId');
		
			if(!is_numeric($ordenId))
			{
				$url	=	'/Facturacion/Facturar/Mensaje/1';
		        $this->GetResponse()->SetHeader("Location", $url);
			}
			
			
		    $orden		= Doctrine::getTable('OrdenDeTrabajo')->FindOneById( $ordenId );
	
	        if(is_object($orden))
	        {
	        	$orden = $orden->CrearOrdenFicticia();

            	$url	=	'/Facturacion/Facturar/Mensaje/2/ClienteId/'.$orden->ClienteId;
		        $this->GetResponse()->SetHeader("Location", $url);
	        	
	        	
	        }
        }
        catch (Exception $e) {
        	echo 'Hubo un error al crear la orden de trabajo ficticia. '. $e->getMessage();
        }

    }
	
}
?>