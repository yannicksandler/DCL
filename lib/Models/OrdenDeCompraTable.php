<?php
/**
 */
class OrdenDeCompraTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$q  =   Doctrine_Query::create()
                    ->from('OrdenDeCompra oc');
            
            if(isset($filters['OrdenDePagoId']) and is_numeric($filters['OrdenDePagoId']))
            {
            	$OrdenDePagoId	=	$filters['OrdenDePagoId'];
           	
                $q->andWhere('oc.OrdenDePagoId = ?', $OrdenDePagoId);
             
            }
            
			if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde'))
            {
            	$FechaDesde	=	$filters['FechaDesde'];
            	if($FechaDesde != '')
            	{
                
                $dateHelper = new Classes_DateHelper();
            
                $q->andWhere('oc.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            	}
            }
            
            
            if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != 'Fecha hasta'))
            {
                $FechaHasta = $filters['FechaHasta'];
                
               	if($FechaHasta != '')
            	{
            
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('oc.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            	}
            }
            
        
        	if(isset($filters['NombreProveedor']) and ($filters['NombreProveedor'] != 'Nombre proveedor'))
        	{
        		$NombreProveedor	=	$filters['NombreProveedor'];
        		
     			$q->innerJoin('oc.Insumo i')
     				->innerJoin('i.Proveedor p')
     				->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');   		
        	}
        	
			if(isset($filters['OrdenDeCompraId']) and is_numeric($filters['OrdenDeCompraId']))
            {
                $OrdenDeCompraId	=	$filters['OrdenDeCompraId'];	
                $q->andWhere('oc.Id = ?', $OrdenDeCompraId);
                
            }
            
            if(isset($filters['OrdenDeTrabajoId']))
            {
            	$ordenid	=	$filters['OrdenDeTrabajoId'];
            	
            	$q->innerJoin('oc.Insumo i')
            		->innerJoin('i.Orden o')
            		->andWhere('o.Id = ?', $ordenid);
            }
            
            /* estan pendientes si:
             * -no estan anuladas
             * -no estan pagas (no tiene orden de pago)
             *@deprecated 17/3/2013 / se usa: pendientes de pago
			if(isset($filters['Pendientes']) and ($filters['Pendientes'] == 'SI'))
            {
            	$q->andWhere('ISNULL(o.fechaanulacion)')
            		->andWhere('ISNULL(o.ordendepagoid)');
            		//->orWhere('oc.pagado != ?', 'S');// usar para poder pagar OC parcial, cuando completo pago con distintas OP, set pagado=SI
            }
            */
		//echo $q->GetSqlQuery();
        return $q;
	}
	
	/* ordenes de compra pendientes de pago 
	 * - no tienen orden de pago asociada (caso anterior)
	 * - no estan anuladas
	 * - tienen importe pendiente
	 * @deprecated 26.2.2013
	 */
	public function GetPendientes($filters)
	{
		$subselect	=	'(
        SELECT SUM(o3.importeabonado)
		FROM OrdenDePagoOrdenDeCompra o3
		WHERE o3.ordendecompraid = o.id
        ) as ImporteAbonado';
		
		$q  =   Doctrine_Query::create()
					->select('*, '.$subselect)
                    ->from('OrdenDeCompra o')
                    ->innerJoin('o.Insumo i')
                    ->andWhere('ISNULL(o.fechaanulacion)')
                    ->orderBy('o.fecha DESC');
                    //->andWhere('o.pagado != ?', 'S')
                    
            
            if(isset($filters['ProveedorId']) and is_numeric($filters['ProveedorId']))
            {
            	$ProveedorId	=	$filters['ProveedorId'];
           	
                $q->andWhere('i.ProveedorId = ?', $ProveedorId);
             
            }
            
        echo $q->getSqlQuery();
        return $q;
	}
	
	/* todas las ordenes de compra que tienen importe pendiente de pago */
	// se pueden haber liquidado indirectamente en una factura de compra
	// o directamente en un anticipo de pago
	public function GetPendientesDePago($filters)
	{
		/*
		$statement = Doctrine_Manager::getInstance()->connection();
		
		$results = $statement->execute("SELECT * FROM orden_de_compra WHERE id = ?", array(1));
		
		var_dump($results->fetchAll());
		*/
		$q	=	$this->GetByFilter($filters);
		
		$q->andWhere('oc.FechaAnulacion IS NULL');
		// dado que Doctrine hace complejo hacer querys complejos
		// se agrega atributo PendienteDePago = SI/NO
		$q->andWhere('oc.PendienteDePago = \'SI\'');
		
		$q->innerJoin('oc.Insumo i')
			->orderBy('i.OrdenId DESC');
		
		//echo $q->getSqlQuery();
		return $q;
	}
	
	public function GetNoAnuladas($filters)
	{
		$q  =   Doctrine_Query::create()
		->from('OrdenDeCompra o')
		->andWhere('o.fechaanulacion IS NULL');
		
		
		
		if(isset($filters['ProveedorId']) and is_numeric($filters['ProveedorId']))
		{
			$ProveedorId	=	$filters['ProveedorId'];
		
			$q->andWhere('o.ProveedorId = ?', $ProveedorId);
			 
		}
		
		if(isset($filters['TipoDePago']))
		{
			if($filters['TipoDePago'] == 'B')
			{
				$q->innerJoin('o.TipoIva ti')
				->andWhereIn('ti.Letra_comp', array('A','B','C'));
			}
				
			if($filters['TipoDePago'] == 'N')
			{
				$q->innerJoin('o.TipoIva ti')
				->andWhereIn('ti.Letra_comp', array('N'));
			}
		}
		
		$q->orderBy('o.fecha ASC');
		
		//echo $q->getSqlQuery();
		return $q;
	}
	
	public function GetNoAnuladasEnBlanco($filters)
	{
		$filters['EnBlanco'] = 'SI';
		
		return $this->GetNoAnuladas($filters);
	}
	
	public function GetPendientesDeValidar($filters)
	{
		
		$query	=	"
SELECT DATE_FORMAT(oc.fecha,'%d/%m/%Y') Fecha,
oc.id Id,
oc.importe Importe,
oc.importe - 
(
select ifnull(sum(opoc.importeabonado),0)
from orden_de_pago_orden_de_compra opoc
inner join orden_de_pago op on opoc.ordendepagoid=op.id
where op.fechaanulacion is null and opoc.ordendecompraid=oc.id
) ImportePendienteDePago,
oc.importe - 
(
select ifnull(sum(fcoc.importeliquidado),0)
from factura_compra_orden_de_compra fcoc
inner join factura_compra fc on fc.numero=fcoc.facturanumero and fc.tipoivaid=fcoc.tipoivaid and fc.proveedorid=fcoc.proveedorid
where fcoc.ordendecompraid = oc.id
and fc.fechaanulacion is null
) ImportePendienteDeValidar,
i.fechadeentrega Entregado,
i.formadepago FormaDePago,
i.ordenid OrdenDeTrabajoId,
i.Nombre InsumoNombre,
p.Nombre ProveedorNombre,
p.id ProveedorId
FROM orden_de_compra oc
inner join insumo i on oc.id=i.ordendecompraid
inner join proveedor p on p.id=i.proveedorid
WHERE oc.importe >
(
select ifnull(sum(fcoc.importeliquidado),0)
from factura_compra_orden_de_compra fcoc
inner join factura_compra fc on fc.numero=fcoc.facturanumero and fc.tipoivaid=fcoc.tipoivaid and fc.proveedorid=fcoc.proveedorid
where fcoc.ordendecompraid = oc.id
and fc.fechaanulacion is null
) AND oc.fechaanulacion IS NULL AND oc.importecompensatorio is null";
		
		if(isset($filters['ProveedorId']) and is_numeric($filters['ProveedorId']))
		{
			$ProveedorId	=	$filters['ProveedorId'];
		
			$query = $query .
				" and oc.proveedorid = ".$ProveedorId."";
			 
		}
		//Assume that you have connected to a database instance...
		$statement = Doctrine_Manager::getInstance()->connection();
		//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
		$results = $statement->execute($query);
		$dataset	=	$results->fetchAll();
		 
		return $dataset;
		
		$query		= Doctrine::getTable('OrdenDeCompra')->GetNoAnuladas( $filters );
		$ordenes = $query->execute();
		
		$ordenesCompraPendientes = array();
		
		foreach($ordenes as $o)
		{
			if($o->IsPendienteDeValidar())
				$ordenesCompraPendientes[] = $o;
		}
		
		
		return $ordenesCompraPendientes;
	}
}