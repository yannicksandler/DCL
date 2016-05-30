<?php
/**
 */
class PrioridadTable extends Doctrine_Table implements IDS_Doctrine_Model_ISortable
{
    public function GetDefaultSortColumn()
	{
		return 'Id';
	}

    public function GetDefaultSort()
	{
		return 'DESC';
	}
}