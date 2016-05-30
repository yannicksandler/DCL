<?php

/**
 * CobranzaDetalle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class CobranzaDetalle extends BaseCobranzaDetalle
{
	public function GetNombrePagoTipo()
	{
		return $this->PagoTipo->Nombre;
	}
	
	public function GetFechaCobro()
	{
		return $this->Cheque->FechaCobro;
	}
	
	public function GetPagoTipoNombre()
	{
		return $this->PagoTipo->Nombre;
	}
	
	public function GetCliente()
	{
		return $this->Cobranza->Cliente;
	}
	
	public function GetFechaCobranza()
	{
		return $this->Cobranza->Fecha;
	}
}