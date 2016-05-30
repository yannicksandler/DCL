<?php
class Backend_Controllers_FacturacionController extends IDS_Controller_Action_Standard {

	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}

	public function ListAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );

		$layout = $this->View->LayoutView ();

		$request	=	$this->GetRequest ();
		$params     =   $request->Params();

		$layout->SetParam ( 'titleFile', 'Backend/Facturacion/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Facturacion/Record.tpl' );
		
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Facturacion' );
		$layout->SetParam ( 'varAction', 'List' );
		$layout->SetParam ( 'notAdd', true );
		// ocultar site header
		$layout->SetParam ( 'classHeader', 'header' );

		$layout->SetParam('filterBox',    'Backend/Facturacion/FilterBox.tpl');

		$linkAgregarPrestacion	=	"<a title=\"Nueva factura\" class=\"AgregarPrestacion linkSendHome\" type=\"button\" href=\"/Facturacion/Facturar\"><img src=\"/images/icons/add.png\" title=\"Agregar\"/> Nueva factura &raquo;</a>";
		$layout->SetParam('specialLink',  $linkAgregarPrestacion);

		$return = array ();

		$filters	=	array();

		$FechaDesde	=	str_replace("_", "/", $request->Param("FechaDesde"));
		$FechaHasta	=	str_replace("_", "/", $request->Param("FechaHasta"));
		$FacturaId	=	$request->Param("FacturaId");
		$ClienteNombre	=	$request->Param("ClienteNombre");
		$FacturaTipo	=	$request->Param("FacturaTipo");
		$PendienteCobro	=	$request->Param("PendienteCobro");

		$filters['FechaDesde']	=	$FechaDesde;
		$filters['FechaHasta']	=	$FechaHasta;
		$filters['FacturaId']	=	$FacturaId;
		$filters['ClienteNombre']	=	$ClienteNombre;
		$filters['FacturaTipo']	=	$FacturaTipo;
		$filters['PendienteCobro']	=	$PendienteCobro;

		if(isset($PendienteCobro) and ($PendienteCobro=='SI'))
		{
			$FacturasQuery	=	Doctrine::GetTable ( 'Factura' )->GetPendientesDeCobro($filters);
			//echo $FacturasQuery->getSqlQuery();
			$layout->SetParam ( 'CantidadEncontrados', count($FacturasQuery ));
			$layout->SetParam ( 'sectionTitle', 'Listado de facturas que tienen importe por cobrar' );			
		}
		else
		{
			$FacturasQuery	=	Doctrine::GetTable ( 'Factura' )->GetByFilter($filters);
			$layout->SetParam ( 'CantidadEncontrados', count($FacturasQuery->execute()) );
			$layout->SetParam ( 'sectionTitle', 'Listado de facturas realizadas' );		
		}
		
		$this->List->ProcessListQuery(   Doctrine::GetTable('Factura'),
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
                                            
		if($ClienteNombre)
        	$layout->SetParam("ClienteNombre", $ClienteNombre);

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
	public function FacturarAction()
	{
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );

		$request	=	$this->GetRequest ();
		$params     =   $request->Params();

		$ClienteId	=	$request->Param("ClienteId");
		$FechaFactura	=	$request->Param("FechaFactura");
		$OrdenesId	=	$request->Param("OrdenesId");
		$data	=	$request->Param("data");
		$Mensaje	=	$request->Param("Mensaje");
		

		$view = $this->View->View ();
		$return = array ();

		$clientetbl	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
		$view->SetParam("Clientes", $clientetbl->FindAll());
		$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
		$view->SetParam("TiposDeIva", $iva->FindAll());
		
		$view->SetParam("FechaFactura", $FechaFactura);
		$view->SetParam("data", $data);

		if($Mensaje == 1)
		{
			$view->SetParam("editErrorMessage", 'No fue posible crear la orden de trabajo ficticia. Intente nuevamente');
		}
        if($Mensaje == 2)
		{
			$view->SetParam("editSuccessMessage", 'Orden de trabajo ficticia creada correctamente. Modifique el importe antes de facturar');
		}
		
		if( $request->IsPost())
		{
			if(isset($ClienteId) and is_numeric($ClienteId))
			{
				$Cliente	=	Doctrine::getTable('Cliente')->FindOneById($ClienteId);
				if(is_object($Cliente))
				{
					try
        			{
        			/**************************************/
        				/* doctrine bug-> genera 2FK en factura table mal */
        				/* ver como hacer q modelo no lo genere */
					$factura = $Cliente->Facturar($FechaFactura, $OrdenesId, $data);
					
					//$url	=	'/Facturacion/List/MensajeFactura/'.$factura->Id;
					//$this->GetResponse()->SetHeader("Location", $url);
					if(!is_object($factura))
						throw new Exception('La factura no fue creada. Es posible que no haya ingresado ordenes de trabajo para facturar. Intente nuevamente');
							
					$view->SetParam("editSuccessMessage", date('d/m/Y'). ': Factura #'. $factura->Id.' creada correctamente.');
					$view->SetParam("FacturaId", $factura->Id);
					$view->SetParam("ClienteId", $ClienteId);
        			}
			        catch (Exception $e) 
			        {
			        	$view->SetParam("editErrorMessage", 'Hubo un error al crear la factura. ' . $e->getMessage());	
			        }
				}
				else
					$view->SetParam("editErrorMessage", date('d/m/Y'). ': Error al generar la factura. el cliente no existe');
				
			}
			else
				$view->SetParam("editErrorMessage", 'Debe ingresar el cliente');
			 
		}
		
		if(is_numeric($ClienteId))
           $view->SetParam("ClienteId", $ClienteId);
		
		 
	}
	
	public function AnularAction()
	{
		
		$this->View->RenderLayout(false);

//		$a	=	new Classes_Session();
	//		$a->Session();
			            
//	        if($a->IsLoggedIn())
	//        {
		$request    =   $this->GetRequest();
		$params     =   $request->Params();
		$view       =   $this->View->View();

		$FacturaId	=	$request->Param("FacturaId");

		if(isset($FacturaId) and is_numeric($FacturaId))
		{
			$Factura	=	Doctrine::getTable('Factura')->FindOneById($FacturaId);
			
			if(isset($Factura) and is_object($Factura))
			{
				try
				{
				 	$Factura->Anular();
					$view->SetParam ( 'SuccessMessage', 'Factura numero ' . $FacturaId . ' anulada correctamente' );
				
				}
				catch (Exception $e) 
				{
        			$view->SetParam("ErrorMessage", 
						'Error al anular la factura. Es posible que el numero de factura '. $FacturaId . ' exista. Verifique en listado de facturas. ' . $e->getMessage());
        	
        		}
					
			}
		}
		else
		{
			$view->SetParam("ErrorMessage", 'Error en los parametros ingresados');
		}	

//	        }
	}
	
	public function FacturaImprimibleAction()
	{
		$this->View->RenderLayout(false);
		/*
		$a	=	new Classes_Session();
		$a->Session();
		            
        if($a->IsLoggedIn())
        {
			
	*/
			$request    =   $this->GetRequest();
			$params     =   $request->Params();
			$view       =   $this->View->View();
			
			$FacturaId	=	$request->Param("FacturaId");
			
	
			if(isset($FacturaId) and is_numeric($FacturaId))
			{
				$Factura	=	Doctrine::getTable('Factura')->FindOneById($FacturaId);
				
				if(is_object($Factura))
				{
					$r = $Factura->GetResumen();
					$view->SetParam ( 'Resumen', $r);
				}
				else
					echo 'la factura ingresada no existe';
			}
		
		/*
        }
        else
        	echo 'No tiene permiso para realizar esta accion';*/
	}

	
}
?>