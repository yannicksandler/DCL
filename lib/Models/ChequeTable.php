<?php
/**
 */
class ChequeTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$q	=	Doctrine_Query::create()
			->from('Cheque c')
			->leftJoin('c.Cliente cl')
			->leftJoin('c.Proveedor p');
		
		if(isset($filters['Estado']) && $filters['Estado'] != '')
		{
			$g	=	new Classes_GestionEconomicaManager();
			$ArrayEstados = $g->GetEstadosCheques();
			
			foreach ($ArrayEstados as $key => $row) {
				if(($filters['Estado'] == $key))
				{
					//var_dump($row);
					$q->andWhere('c.Estado = ?', $row);
				}
				//$position[$key]  = $row[$field];
				//$newRow[$key] = $row;
			}
			/*
			foreach($ArrayEstados as $estadoId)
			{
				var_dump($estadoId);
				if(($filters['Estado'] = $estadoId[]))
						$q->andWhere('c.Estado = ?', $filters['Estado']);
				
			}*/
			
		}
		
		if(isset($filters['Numero']) && $filters['Numero'] > 0)
		{
			$q->andWhere('c.Numero = ?', $filters['Numero']);
		}
		
		if(isset($filters['NombreProveedor']) && ($filters['NombreProveedor'] != 'Nombre proveedor'))
		{
			$q->andWhere('p.Nombre LIKE ?', '%'.$filters['NombreProveedor'].'%');
		}
		
		if(isset($filters['NombreCliente']) && ($filters['NombreCliente'] != 'Nombre cliente'))
		{
			$q->andWhere('cl.Nombre LIKE ?', '%'.$filters['NombreCliente'].'%');
		}
		
		if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha cobro desde') and ($filters['FechaDesde'] != ''))
		{
			$FechaDesde	=	$filters['FechaDesde'];
				
		
			$dateHelper = new Classes_DateHelper();
		
			$q->andWhere('c.FechaCobro >= ?', $dateHelper->fromViewFormat($FechaDesde));
		}
		
		if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha cobro hasta') and ($filters['FechaHasta'] != ''))
		{
		
			$FechaHasta	=	$filters['FechaHasta'];
		
		
			$dateHelper = new Classes_DateHelper();
		
		
			$q->andWhere('c.FechaCobro <= ?', $dateHelper->fromViewFormat($FechaHasta));
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