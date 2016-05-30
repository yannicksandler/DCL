<?php
/**
 */
class PagoTipoTable extends Doctrine_Table
{
	public function GetTiposCobranza()
	{
		$array	=	array(1,5,3,12,14,15,16);
		$q  =   Doctrine_Query::create()
			->from('PagoTipo pt')
			->whereNotIn('pt.Id', $array);
		
		return $q->execute();
	}
	
	public function GetTiposOrdenDePago()
	{
		$array	=	array(5,3);
		$q  =   Doctrine_Query::create()
		->from('PagoTipo pt')
		->whereNotIn('pt.Id', $array);
	
		return $q->execute();
	}
}