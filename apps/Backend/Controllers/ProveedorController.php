<?php
class Backend_Controllers_ProveedorController extends IDS_Controller_Action_Standard {
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
	
	public function ListAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
		
		$layout = $this->View->LayoutView ();
		
		$layout->SetParam ( 'titleFile', 'Backend/Proveedor/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Proveedor/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Proveedores' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Proveedor' );
		$layout->SetParam ( 'varAction', 'List' );
		
		$search = $this->GetRequest()->Param('search');
        $layout->SetParam ( 'search', $search );
		
		$return = array ();
		
		// autocomplete
		$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
		$layout->SetParam("ArrayProveedores", $proveedores);
		
		$this->List->ProcessList ( Doctrine::GetTable ( 'Proveedor' ), $this->GetRequest ()->Params (), $return, array ('updateColumn' => 'Status', 'updateField' => 'selectId', 'deleteField' => 'selectId', 'searchField' => 'Nombre' ), $this->View->LayoutView () );
	}
	
	public function EditAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		
		$view = $this->View->View ();
		$return = array ();
		
		$view->SetParam ( 'popup', $this->GetRequest()->Param('popup') );
		$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
		$view->SetParam("TiposDeIva", $iva->FindAll());
		
		$rubros = Doctrine::getTable('Rubro')->GetRubrosProveedores();
		$view->SetParam("Rubros", $rubros);
		$view->SetParam ( "TiposDeGasto", Doctrine::getTable('TipoGasto')->findAll() );
	
		$tbl = Doctrine::GetTable ( 'Proveedor' );
		$this->Edit->ProcessFormEdit ( $tbl, //nombre del modelo
				$this->GetRequest ()->Param ( "data" ), $return, null, $view );
						
	}
		
}
?>