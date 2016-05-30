<?php
/**
 */
class TipoGastoTable extends Doctrine_Table
{
	public function GetAll()
	{
		$q  =   Doctrine_Query::create()
		->from('TipoGasto r')
		->orderBy('r.Nombre ASC');
		//echo $q->getSqlQuery();
		return $q;
	}
}