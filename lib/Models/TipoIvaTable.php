<?php
/**
 */
class TipoIvaTable extends Doctrine_Table
{
	public function GetTipoIvaNegroId()
	{
		$tipo = 'N';
		
		$tipoiva  =   Doctrine_Query::create()
                    ->from('TipoIva t')
                    ->andWhere('t.letra_comp = ?', $tipo)->execute();
		
		foreach($tipoiva as $p)
		{
			return $p->Id;
		}
	}
}