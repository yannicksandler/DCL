<?php
/**
 */
class ChequeTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$q	=	Doctrine_Query::create()
			->from('Cheque c');
		
		if(isset($filters['Estado']))
		{
			$q->andWhere('c.Estado = ?', $filters['Estado']);
		}
		
		if(isset($filters['Numero']) && $filters['Numero'] > 0)
		{
			$q->andWhere('c.Numero = ?', $filters['Numero']);
		}
		//echo $q->getSqlQuery();
		
		return $q;
		
	}
	
	public function ChequesTerceros($filters)
	{
		$q	=	Doctrine_Query::create()
			->from('Cheque c')
			->andWhere('c.Estado = ?', 'En cartera')
			->andWhere('c.FechaAnulacion IS NULL');
		
		if(isset($filters['TipoDePago']))
		{
			if($filters['TipoDePago'] == 'B')
			{
				$q->andWhere('c.Tipo = ?', 'B');
			}
			
			if($filters['TipoDePago'] == 'N')
			{
				$q->andWhere('c.Tipo = ?', 'N');
			}
		}
		
		$s	=	new Classes_Session();
		$s->Session();
		$pagos	=	$s->GetPagosLiquidadosOrdenDePago();
		
		if(count($pagos))
		{
			foreach ($pagos as $p)
			{
				if(isset($p['ChequeId']))
				{
					$q->andWhere('c.Id <> ?', $p['ChequeId']);
				}
			}
			
		}
		//echo $q->getSqlQuery();
		return $q;
	}
	
	public function ChequesEmitidos()
	{
		$q	=	Doctrine_Query::create()
		->from('Cheque c')
		->andWhere('c.Estado = ?', 'Emitido');
	
		return $q;
	}
	
	public function ChequesPendientesAcreditar($data)
	{
		$q	=	Doctrine_Query::create()
		->from('Cheque c')
		->andWhere('c.Estado = ?', 'Pendiente acreditar');
		
		if(isset($data['BancoId']))
		{
			$q->andWhere('c.BancoId = ?', $data['BancoId']);
		}
	
		return $q;
	}
	
	public function ChequesPendientesDebitar($data)
	{
		$q	=	Doctrine_Query::create()
		->from('Cheque c')
		->andWhere('c.Estado = ?', 'Pendiente debitar');
		
		if(isset($data['BancoId']))
		{
			$q->andWhere('c.BancoId = ?', $data['BancoId']);
		}
	
		return $q;
	}
	
	public function GetChequesVigentesDePago()
	{
		$q	=	Doctrine_Query::create()
			->from('Cheque c')
			->andWhere('c.Estado = ?', 'En cartera')
			->andWhere('c.FechaAnulacion IS NULL');
		
		return $q;
	}
}