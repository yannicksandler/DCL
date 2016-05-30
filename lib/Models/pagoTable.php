<?php
/**
 */
class PagoTable extends Doctrine_Table
{
	public function BorrarPago($PagoId)
	{
		if(is_numeric($PagoId))
		{
			$Pago		= Doctrine::getTable('Pago')->FindOneById( $PagoId );
			
			if(is_object($Pago))
				$Pago->delete();
			
			return true;
		}

		return false;
	}
}