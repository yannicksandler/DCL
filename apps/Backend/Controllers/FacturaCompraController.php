<?php
class Backend_Controllers_FacturaCompraController extends IDS_Controller_Action_Standard {

	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}

	public function ListAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );

		$layout = $this->View->LayoutView ();

		$request	=	$this->GetRequest ();
		$params     =   $request->Params();

		$layout->SetParam ( 'titleFile', 'Backend/FacturaCompra/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/FacturaCompra/Record.tpl' );
		
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'FacturaCompra' );
		$layout->SetParam ( 'varAction', 'List' );
		$layout->SetParam ( 'notAdd', true );

		$layout->SetParam('filterBox',    'Backend/FacturaCompra/FilterBox.tpl');
		
		$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
		$layout->SetParam("ArrayProveedores", $proveedores);

		//$linkAgregarPrestacion	=	"<a title=\"Nueva factura\" class=\"AgregarPrestacion linkSendHome\" type=\"button\" href=\"/FacturaCompra/Facturar\"><img src=\"/images/icons/add.png\" title=\"Agregar\"/> Nueva factura &raquo;</a>";
		//`$layout->SetParam('specialLink',  $linkAgregarPrestacion);

		$return = array ();

		$filters	=	array();

		$FechaDesde	=	str_replace("_", "/", $request->Param("FechaDesde"));
		$FechaHasta	=	str_replace("_", "/", $request->Param("FechaHasta"));
		$FacturaId	=	$request->Param("FacturaId");
		$ProveedorNombre	=	$request->Param("ProveedorNombre");
		$FacturaTipo	=	$request->Param("FacturaTipo");
		$PagoPendiente	=	$request->Param("PagoPendiente");
		$filters	=	$request->Param("filters");
		

		
		$filters['FechaDesde']	=	$FechaDesde;
		$filters['FechaHasta']	=	$FechaHasta;
		$filters['Numero']	=	$FacturaId;
		$filters['ProveedorNombre']	=	$ProveedorNombre;
		$filters['FacturaTipo']	=	$FacturaTipo;
		$filters['PagoPendiente']	=	$PagoPendiente;

		if(isset($PagoPendiente) and ($PagoPendiente=='SI'))
		{
			$FacturasQuery	=	Doctrine::GetTable ( 'FacturaCompra' )->GetPendientesDePago($filters);
			//$FacturasQuery->orderBy('f.Fecha DESC');
			//echo $FacturasQuery->getSqlQuery();
			$layout->SetParam ( 'CantidadEncontrados', count($FacturasQuery ));
			$layout->SetParam ( 'sectionTitle', 'Facturas de compra pendientes de pago' );			
		}
		else
		{
			$FacturasQuery	=	Doctrine::GetTable ( 'FacturaCompra' )->GetByFilter($filters);
			//$FacturasQuery->orderBy('f.Fecha DESC');
			$layout->SetParam ( 'CantidadEncontrados', count($FacturasQuery));
			$layout->SetParam ( 'sectionTitle', 'Facturas de compra' );		
		}
		
		$this->List->ProcessListQuery(   Doctrine::GetTable('FacturaCompra'),
		$FacturasQuery,
		$params,
		$return,
		array(
                                            'updateColumn' => 'Status',
                                            'updateField'  => 'selectId',
                                            'deleteField'  => 'selectId'
                                            ),
                                            $layout
                                            );
                                            
        if($FechaDesde != 'Fecha desde')
           $layout->SetParam("FechaDesde", str_replace("/", "_", $FechaDesde));
                                             
        if($FechaHasta != 'Fecha hasta')
        	$layout->SetParam("FechaHasta", str_replace("/", "_", $FechaHasta));
                                             
        if(is_numeric($FacturaId))
        	$layout->SetParam("FacturaId", $FacturaId);
                                            
		if($ProveedorNombre)
        	$layout->SetParam("ProveedorNombre", $ProveedorNombre);

        if($FacturaTipo)
        	$layout->SetParam("FacturaTipo", $FacturaTipo);

        $FacturaNumero	=	$request->Param("MensajeFactura");
        if(is_numeric($FacturaNumero))
        	$layout->SetParam("successMessage", 'Factura #'.$FacturaId.' creada correctamente');

	}

	/* ojo con schema.yml
	 * Doctrine genera una FK en la tabla factura hacia ordenes de trabajo
	 * que no es necesaria y no permite insertar una factura
	 */
	public function EditAction()
	{
		$a	=	new Classes_Session();
		$a->Session();
		 
		//if($a->IsLoggedIn())
		//{
		try {
			$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
	
			$request	=	$this->GetRequest ();
			$params     =   $request->Params();
	
			$data	=	$request->Param("data");
			$Mensaje	=	$request->Param("Mensaje");
	
			$view = $this->View->View ();
			$return = array ();
	
			$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
			$view->SetParam("ArrayProveedores", $proveedores);
			$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
			$view->SetParam("TiposDeIva", $iva->FindAll());
			$view->SetParam("Proveedores", Doctrine::getTable('Proveedor')->findAll());
			$view->SetParam("TiposDeGasto", Doctrine::getTable('TipoGasto')->findAll());
			$view->SetParam("IsPerfilAdministrador", $a->GetUser()->IsPerfilAdministrador());
			
			$view->SetParam("data", $data);
			
	
			if($Mensaje == 1)
			{
				$view->SetParam("editErrorMessage", 'No fue posible crear la orden de trabajo ficticia. Intente nuevamente');
			}
	        if($Mensaje == 2)
			{
				$view->SetParam("editSuccessMessage", 'Orden de trabajo ficticia creada correctamente. Modifique el importe antes de facturar');
			}
			
			if(isset($data['ProveedorId']))
				$ProveedorId = $data['ProveedorId'];
			else 
				$ProveedorId = $request->Param("ProveedorId");
				
			if(isset($ProveedorId) and is_numeric($ProveedorId))
			{
				$Proveedor	=	Doctrine::getTable('Proveedor')->FindOneById($ProveedorId);
				if(!is_object($Proveedor))
				{
					$view->SetParam("editErrorMessage", 'El proveedor no existe');
				}
				
				$view->SetParam("Proveedor", $Proveedor);
			}
					
			if( $request->IsPost())
			{
				// si es creacion de factura
					try
        			{
						$factura = $Proveedor->CrearFacturaCompra($data);
						
						if(!is_object($factura))
							throw new Exception('La factura no fue creada. Intente nuevamente');
						
						$view->SetParam("editSuccessMessage", 'Factura #'. $factura->Numero.' creada correctamente.');
						$view->SetParam("Factura", $factura);
						$view->SetParam("OrdenesDeCompraLiquidadas", $factura->GetOrdenesDeCompraLiquidadas());
        			}
			        catch (Exception $e) 
			        {
			        	$view->SetParam("editErrorMessage", 'Hubo un error al crear la factura. ' . $e->getMessage());	
			        }
					
				 
			}
			else 
			{
				if(isset($Proveedor) and is_object($Proveedor))
				{
					// si es edicion de factura
					$facturaNumero = $request->Param("FacturaNumero");
					$tipoIvaId = $request->Param("TipoIvaId");
					
					if(isset($facturaNumero) and is_numeric($facturaNumero)
							and isset($tipoIvaId) and is_numeric($tipoIvaId)
							)
					{
						$factura = $Proveedor->GetFacturaCompra($facturaNumero, $tipoIvaId);
			
						if(!is_object($factura))
							throw new Exception('La factura no fue encontrada. Intente nuevamente');
						
						$view->SetParam("OrdenesDeCompraLiquidadas", $factura->GetOrdenesDeCompraLiquidadas());
						
						$data['Factura'] = $factura;
						$data['Fecha'] = $factura->Fecha;
						$data['Numero'] = $factura->Numero;
						$data['TipoIvaId'] = $factura->TipoIvaId;
						$data['Importe'] = $factura->Importe;//total
						$data['ImporteLiquidado'] = $factura->GetImporteLiquidado();
						$data['TipoNota'] = $factura->TipoNota;
						$data['TipoGastoId'] = $factura->TipoGastoId;
						$data['ProveedorId'] = $factura->ProveedorId;
						$data['ProveedorNombre'] = $factura->Proveedor->Nombre;
						
						$view->SetParam("Editable", true);
					}
				}
				
				$view->SetParam("data", $data);
				
				
			}
			}
			catch (Exception $e)
			{
				$view->SetParam("editErrorMessage",
						'Es posible que el numero de factura no exista. Verifique en listado de facturas. ' . $e->getMessage());
			
			}
		//}
	}
	
	public function AnularAction()
	{
		try
		{
			$this->View->RenderLayout(false);
	
	//		$a	=	new Classes_Session();
		//		$a->Session();
				            
	//	        if($a->IsLoggedIn())
		//        {
			$request    =   $this->GetRequest();
			$params     =   $request->Params();
			$view       =   $this->View->View();
	
			$FacturaNumero	=	$request->Param("FacturaNumero");
			$ProveedorId	=	$request->Param("ProveedorId");
			$TipodIvaId	=	$request->Param("TipoIvaId");
			
			if(isset($ProveedorId) and is_numeric($ProveedorId))
			{
				$Proveedor	=	Doctrine::getTable('Proveedor')->FindOneById($ProveedorId);
				if(!is_object($Proveedor))
				{
					throw new Exception('El proveedor no existe');
				}
			}
			
			$factura = $Proveedor->GetFacturaCompra($FacturaNumero, $TipodIvaId);
			
			if(!is_object($factura))
				throw new Exception('La factura no fue encontrada. Intente nuevamente');
			
			$factura->Anular();
			
			$view->SetParam("SuccessMessage",
					'Factura de compra. '.$factura->Numero.' anulada');
			/* redirigir a listado de facturas pendientes de pago */
			//$grafo	=	new Classes_GrafoNavegacion($this);
			//$grafo->GoToFacturasDeCompraPendientes();
			//$url	=	'/FacturaCompra/List/order/Fecha_DESC';	
			//$this->GetResponse()->SetHeader('Location', $url);
		}
		catch (Exception $e)
		{
			$view->SetParam("ErrorMessage",
					'Error al anular la factura. Es posible que el numero de factura no exista. Verifique en listado de facturas. ' . $e->getMessage());
			 
		}

	}
	
	public function GetOrdenesDeCompraPendientesAction()
	{
		$this->View->RenderLayout(false);
		 
		$view       =   $this->View->View();
		$this->View->SetViewTemplate('Backend/FacturaCompra/OrdenesDeCompraPendientes.tpl');
	
		try
		{
			//$c = new Classes_Session();
			//if($c->IsLoggedIn())
			//{
				/* obtener parametros */
				$ProveedorId    = $this->GetRequest()->Param('ProveedorId');
		
				/* controlar parametros */
				if(is_numeric($ProveedorId))
				{
					$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $ProveedorId );
		
					if(is_object($Proveedor))
					{
						$view->SetParam("Pendientes", $Proveedor->GetOrdenesDeCompraPendientesDeValidar());
						$view->SetParam("Proveedor", $Proveedor);
						//$view->SetParam("successMessage", 'Seleccionar ordenes de compra para liquidar');
					}
					else
					{
						throw new Exception('El proveedor no existe');
					}
				}
				else
					throw new Exception('Los parametros ingresados no son numericos');
			//}
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener las ordenes de compra. '. $e->getMessage());
		}
	
	}
	
	public function SetOrdenDeCompraAction()
	{
		$this->View->RenderLayout(false);
		 
		$view       =   $this->View->View();
	
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
			
	
			/* controlar parametros */
			if(is_numeric($data['OrdenDeCompraId']))
			{
				$OrdenDeCompra		= Doctrine::getTable('OrdenDeCompra')->FindOneById( $data['OrdenDeCompraId'] );
	
				if(is_object($OrdenDeCompra))
				{
					$OrdenDeCompra->AgregarOrdenDeCompraAFactura($data);
					
					$view->SetParam("successMessage", true);
				}
				else
				{
					throw new Exception('La orden de compra no existe');
				}
			}
			else
				throw new Exception('Debe ingresar el numero de orden de compra');
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al agregar la orden de compra. '. $e->getMessage());
		}
	
	}
	
	public function GetImporteTotalLiquidadoAction()
	{
		try
		{
			$this->View->RenderLayout(false);
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$request    =   $this->GetRequest();
				$params     =   $request->Params();
				$view       =   $this->View->View();
					
				//$view->SetParam("Importe", number_format($a->GetImporteLiquidadoFacturaCompra(),2));
				$view->SetParam("Importe", $a->GetImporteLiquidadoFacturaCompra());
			}
			else
			{
				$view->SetParam("Importe", 'Debe ingresar al sistema');
			}
		}
		catch (Exception $e)
		{
			$view->SetParam("Importe",
					'Error al obtener importe.' . $e->getMessage());
	
		}
	
	}
	
	public function UpdateFacturaCompraAction()
	{
		try
		{
			$this->View->RenderLayout(false);
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$request    =   $this->GetRequest();
				$params     =   $request->Params();
				$view       =   $this->View->View();
				
				$facturaid	=	$request->Param("NumeroInterno");
				$fechaVenc	=	$request->Param("FechaVencimiento");
				
				$factura	=	Doctrine::getTable('FacturaCompra')->FindOneByNumeroInterno($facturaid);
				
				if(!is_object($factura))
				{
					$view->SetParam("errorMessage", 'La factura no existe');
				}
				
				$factura->FechaVencimiento	=	$fechaVenc;
				$factura->save();
				
				$view->SetParam("successMessage", true);
			}
			else
			{
				throw new Exception('Error de login');
			}
		}
		catch (Exception $e)
		{
			$view->SetParam("deleteErrorMessage", 'Error al agregar la orden de compra. '. $e->getMessage());
	
		}
	
	}
	
	
}
?>