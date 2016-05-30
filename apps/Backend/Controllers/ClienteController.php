<?php
class Backend_Controllers_ClienteController extends IDS_Controller_Action_Standard {
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
	
	public function ListAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Cliente/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Cliente/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Clientes' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Cliente' );
		$layout->SetParam ( 'varAction', 'List' );
		
		
		$search = str_replace(' ', '_', $this->GetRequest()->Param('search'));
		$search	= urldecode(str_replace('25', '', $search ));
		//echo $search;
        $layout->SetParam ( 'search', $search);
		
		$return = array ();
		
		$this->List->ProcessList ( Doctrine::GetTable ( 'Cliente' ), $this->GetRequest ()->Params (), $return, array ('updateColumn' => 'Status', 'updateField' => 'selectId', 'deleteField' => 'selectId', 'searchField' => 'Nombre' ), $this->View->LayoutView () );
	}
	
	public function EditAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		
		$view = $this->View->View ();
		$return = array ();
		
		$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
		$view->SetParam("TiposDeIva", $iva->FindAll());
		
		$rubros = Doctrine::getTable('Rubro')->GetRubrosClientes();
		$view->SetParam("Rubros", $rubros);
		
		$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'Cliente' ), //nombre del modelo
			$this->GetRequest ()->Param ( "data" ), $return, null, $view );
		
	}
	
    public function GetOrdenesDeTrabajoSinFacturarAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
        	/* obtener parametros */
			$ClienteId    = $this->GetRequest()->Param('ClienteId');
		
			/* controlar parametros */
			if(is_numeric($ClienteId))
			{
		        $Cliente		= Doctrine::getTable('Cliente')->FindOneById( $ClienteId );
		        
				if(is_object($Cliente))
			    {
	        		$view->SetParam("Pendientes", $Cliente->GetOrdenesDeTrabajoSinFacturar());
	        		$view->SetParam("Resumen", $Cliente->GetResumenPrefacturacion());	
			    }
			    else
			    {
			    	throw new Exception('El cliente no existe');
			    }
			}
			else
            	throw new Exception('Los parametros ingresados no son numericos');
        }
        catch (Exception $e) {
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener las ordenes de trabajo del cliente. '. $e->getMessage());
        }

    }
    
	
}
?>