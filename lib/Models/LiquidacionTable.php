<?php
/**
 */
class LiquidacionTable extends Doctrine_Table
{
	public function BorrarLiquidacion($LiquidacionId)
	{
		if(is_numeric($LiquidacionId))
		{
			$Liquidacion		= Doctrine::getTable('Liquidacion')->FindOneById( $LiquidacionId );
			
			if($Liquidacion)
			{
				$Liquidacion->delete();
			
				return true;
			}
		}

		return false;
	}
}