<?php
/**
 */
class ClienteTable extends Doctrine_Table implements IDS_Doctrine_Model_ISortable
{
    public function GetDefaultSortColumn()
	{
		return 'Nombre';
	}

    public function GetDefaultSort()
	{
		return 'ASC';
	}
	
	public function FindAllArray()
	{
		$string = "";
		$clientes = Doctrine::getTable('Cliente')->FindAll();
	
		foreach($clientes as $p)
		{
			$string = $string . str_replace(",", ".",'"'.$p->Nombre.'"') . ",";
		}
	
		$string = substr ($string, 0, strlen($string) - 1);
		return $string;
	}

}