<?php

/**
 * BaseOrdenDePagoOrdenDeCompra
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property integer $OrdenDePagoId
 * @property integer $OrdenDeCompraId
 * @property decimal $ImporteAbonado
 * @property OrdenDePago $OrdenDePago
 * @property OrdenDeCompra $OrdenDeCompra
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseOrdenDePagoOrdenDeCompra extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('orden_de_pago_orden_de_compra');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('OrdenDePagoId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('OrdenDeCompraId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('ImporteAbonado', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => '10',
             ));


        $this->index('fk_OrdenDePagoOrdenDeCompra_orden_de_pago1', array(
             'fields' => 
             array(
              0 => 'OrdenDePagoId',
             ),
             ));
        $this->index('fk_OrdenDePagoOrdenDeCompra_orden_de_compra1', array(
             'fields' => 
             array(
              0 => 'OrdenDeCompraId',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrdenDePago', array(
             'local' => 'OrdenDePagoId',
             'foreign' => 'Id'));

        $this->hasOne('OrdenDeCompra', array(
             'local' => 'OrdenDeCompraId',
             'foreign' => 'Id'));
    }
}