<?php

/**
 * BaseFactura
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property date $Fecha
 * @property integer $ClienteId
 * @property decimal $Importe
 * @property integer $TipoIvaId
 * @property clob $Comentario
 * @property decimal $ComentarioImporte
 * @property date $FechaAnulacion
 * @property decimal $ImporteIva
 * @property decimal $ImporteSubtotal
 * @property date $FechaVencimiento
 * @property integer $OrdenDeTrabajoId
 * @property Cliente $Cliente
 * @property TipoIva $TipoIva
 * @property OrdenDeTrabajo $OrdenDeTrabajo
 * @property Doctrine_Collection $CobranzaLiquidaciones
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseFactura extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('factura');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('Fecha', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('ClienteId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('Importe', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'unsigned' => true,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('TipoIvaId', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('Comentario', 'clob', 65535, array(
             'type' => 'clob',
             'length' => '65535',
             ));
        $this->hasColumn('ComentarioImporte', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => '10',
             ));
        $this->hasColumn('FechaAnulacion', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('ImporteIva', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'unsigned' => true,
             'length' => '10',
             ));
        $this->hasColumn('ImporteSubtotal', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'unsigned' => true,
             'length' => '10',
             ));
        $this->hasColumn('FechaVencimiento', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('OrdenDeTrabajoId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));


        $this->index('fk_Factura_cliente1', array(
             'fields' => 
             array(
              0 => 'ClienteId',
             ),
             ));
        $this->index('fk_Factura_TipoIva1', array(
             'fields' => 
             array(
              0 => 'TipoIvaId',
             ),
             ));
        $this->index('fk_Factura_OrdenTrabajo1', array(
             'fields' => 
             array(
              0 => 'OrdenDeTrabajoId',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Cliente', array(
             'local' => 'ClienteId',
             'foreign' => 'Id'));

        $this->hasOne('TipoIva', array(
             'local' => 'TipoIvaId',
             'foreign' => 'Id'));

        $this->hasOne('OrdenDeTrabajo', array(
             'local' => 'OrdenDeTrabajoId',
             'foreign' => 'Id'));

        $this->hasMany('CobranzaLiquidacion as CobranzaLiquidaciones', array(
             'local' => 'Id',
             'foreign' => 'FacturaId'));
    }
}