<?php

/**
 * OrdenDePagoOrdenDeCompra
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class OrdenDePagoOrdenDeCompra extends BaseOrdenDePagoOrdenDeCompra
{
	public function preInsert( $event)
	{
		$totalLiq	=	$this->ImporteAbonado +
						$this->OrdenDeCompra->GetTotalLiquidadoEnOrdenDePago();// sumatoria de importes
						// liquidados en ordenes de pago
		if($totalLiq > $this->OrdenDeCompra->Importe)
			throw new Exception('El importe liquidado supera al importe de la orden de compra. Crear OC compensacion');
	}
	
	public function postInsert( $event)
	{
		$invoker = $event->getInvoker();
	
		$this->ControlarPagoDeOrdenDeCompra();
	}
	
	public function ControlarPagoDeOrdenDeCompra()
	{
		// si pago total de OC (en distintas ordenes de pago) 
		// es mayor o igual al importe de la OC, marca como pagada
	
		// si no esta pendiente de pago, marcar OC como pagada
		if(!$this->OrdenDeCompra->IsPendienteDePago())
		{
			$this->OrdenDeCompra->PendienteDePago = 'NO';
			$this->OrdenDeCompra->save();
		}
	}
	
	public function TotalLiquidadoSuperaImporteTotal()
	{
		$totalLiq	=	$this->ImporteAbonado +
		$this->OrdenDeCompra->GetTotalLiquidadoEnOrdenDePago();// sumatoria de importes
		// liquidados en ordenes de pago
		if($totalLiq > $this->OrdenDeCompra->Importe)
			return true;
		
		return false;
	}
}