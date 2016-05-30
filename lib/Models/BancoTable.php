<?php
/**
 */
class BancoTable extends Doctrine_Table
{
	public function GetDefaultSortColumn()
	{
		return 'Nombre';
	}
	
	public function GetDefaultSort()
	{
		return 'ASC';
	}
	
	public function GetCuentasBancosPropios()
	{
		$q	=	Doctrine_Query::create()
		->from('Banco b')
		->where('b.TipoBanco = ?', 'P' );
		
		return $q;
	}
}