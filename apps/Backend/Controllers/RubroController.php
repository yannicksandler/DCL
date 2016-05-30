<?php
class Backend_Controllers_RubroController extends IDS_Controller_Action_Standard {
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}

	public function EditAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );

		$view = $this->View->View ();
		$return = array ();

	
			$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'Rubro' ), //nombre del modelo
				$this->GetRequest ()->Param ( "data" ), $return, null, $view );
		

	}

	public function ListAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );

		$layout = $this->View->LayoutView ();

		$request	=	$this->GetRequest ();
		$params     =   $request->Params();


		

		$layout->SetParam ( 'titleFile', 'Backend/Rubro/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Rubro/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Rubros' );
		$layout->SetParam ( 'varController', 'Rubro' );
		$layout->SetParam ( 'varAction', 'List' );
		
		//$layout->SetParam('filterBox',    'Backend/PrestacionGrupo/FilterBox.tpl');

		$return = array ();

		$Query	=	Doctrine::GetTable ( 'Rubro' )->GetAll();

		$this->List->ProcessListQuery(   Doctrine::GetTable('Rubro'),
		$Query,
		$params,
		$return,
		array(
                                            'updateColumn' => 'Status',
                                            'updateField'  => 'selectId',
                                            'deleteField'  => 'selectId',
											'searchField'		=> 'Nombre'
                                            ),
                                            $layout
                                            );

		$layout->SetParam('search',  $request->Param("search"));                                            
        
	}

}
?>