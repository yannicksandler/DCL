<?php
/**
 */
class NotificacionTable extends Doctrine_Table
{
	public function GetPendientes()
	{
		$q  =   Doctrine_Query::create()
                    ->from('Notificacion n')
                    ->andWhere('n.Leido IS NULL');
		
		return $q;
	}
}