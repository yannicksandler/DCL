<?php
/**
 */
class RubroTable extends Doctrine_Table
{
	public function GetRubrosProveedores()
	{
		$q  =   Doctrine_Query::create()
			->from('Rubro r')
			->andWhere('r.TipoEntidad = \'PRO\'')
			->orderBy('r.Nombre ASC');
		//echo $q->getSqlQuery();
		return $q->execute();
	}
	
	public function GetRubrosClientes()
	{
		$q  =   Doctrine_Query::create()
		->from('Rubro r')
		->andWhere('r.TipoEntidad = \'CLI\'')
		->orderBy('r.Nombre ASC');
		//echo $q->getSqlQuery();
		return $q->execute();
	}
	
	public function GetAll()
	{
		$q  =   Doctrine_Query::create()
		->from('Rubro r')
		->orderBy('r.Nombre ASC');
		//echo $q->getSqlQuery();
		return $q;
	}
}