<?php
class Backend_Controllers_PresupuestoController extends IDS_Controller_Action_Standard 
{
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
	
	
	public function EditAction() 
	{
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		
		$view = $this->View->View ();
		$return = array ();
		
		$request	=	$this->GetRequest ();
		
		$OrdenId	=	$request->Param ( "OrdenId" );
		$popup = $request->Param('popup');
		
		//$EsPopup	=	$request->Param ( "EsPopup" );

		$data = $request->Param ( "data" );
		$view->SetParam("data", $data);
		
		if(is_numeric($OrdenId))
			$orden	=	Doctrine::getTable('OrdenDeTrabajo')->FindOneById($OrdenId);
		
		$a	=	new Classes_Session();
		$a->Session();
			
		if($a->IsLoggedIn() and $a->GetUser()->IsPerfilVentas())
		{
			$view->SetParam("IsPerfilVentas", true);
		}

		try
		{
			if(is_object($orden))
			{
				
				$orden->ControlarCreacionPresupuesto();
				//$orden->CrearPresupuesto($data);
				
				// guardar registro del modelo presupuesto
				$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'Presupuesto' ), //nombre del modelo
				$request->Param ( "data" ), $return, null, $view );
				
				// asociar presupuesto creado a la orden de trabajo
				if( $request->IsPost() and !array_key_exists('editErrorMessage',$return) )
		        {
			        if(isset($popup))
					{
						$view->SetParam("popupsubmit", $popup);
					}
						
					$PresupuestoId	=	$return['data']->Id;
					if(is_numeric($PresupuestoId))
					{
						$presupuesto	=	Doctrine::getTable('Presupuesto')->FindOneById($PresupuestoId);
						
						$orden->SetPresupuesto($PresupuestoId);
						
						if(is_object($presupuesto))
							$view->SetParam("Resumen", $presupuesto->GetResumen());
						else
							echo 'no se encontro el presupuesto';		
					}
					else
						echo 'el presupuesto no es numerico';
		        }
		        else
		        {
		        	$presupuesto	=	new Presupuesto();
		        	$view->SetParam("Resumen", $presupuesto->GetResumen($orden));
		        	
		        }
		        
		        
				$view->SetParam("data", $orden->Presupuesto);
				
			}
			else
				echo 'Debe ingresar una orden de trabajo';
			
		}
		catch (Exception $e) 
		{
        	$view->SetParam("editErrorMessage", 'Hubo un error crear el presupuesto. '. $e->getMessage());
        }
		 
	}

    public function ViewAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();

        try
        {
			$presupuestoId    = $this->GetRequest()->Param('id');
		
			if(is_numeric($presupuestoId))
			{
		    	$presupuesto		= Doctrine::getTable('Presupuesto')->FindOneById( $presupuestoId );
		    
				if(!is_object($presupuesto))
					$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener el presupuesto');
		        
				$view->SetParam ( "Resumen", $presupuesto->GetResumen() );
			}
            	
        }
        catch (Exception $e) {
        	
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener el presupuesto. Es posible que no exista.');
        }

    }
		
    public function AprobarAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();

        try
        {
			$presupuestoId    = $this->GetRequest()->Param('PresupuestoId');
		
			if(is_numeric($presupuestoId))
			{
		    	$presupuesto		= Doctrine::getTable('Presupuesto')->FindOneById( $presupuestoId );
		    
				if(!is_object($presupuesto))
					$view->SetParam("ErrorMessage", 'El presupuesto ingresado no existe');
		        
				$presupuesto->Aprobar();
				$this->GetResponse()->SetHeader('Location','/Orden/ListPreproduccion/Mensaje/1');
				$view->SetParam("SuccessMessage", 'El presupuesto fue aprobado y la orden cambiada a estado Aprobado');
			}
            	
        }
        catch (Exception $e) {
        	
        	$view->SetParam("ErrorMessage", 'Hubo un error al obtener aprobar el presupuesto.'. $e->getMessage());
        }

    }
    
}	
?>