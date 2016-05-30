<?php

/**
 * BaseInsumo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Nombre
 * @property decimal $Cantidad
 * @property decimal $PrecioUnitarioSinIVA
 * @property string $Elegido
 * @property string $CondicionDePago
 * @property string $FormaDePago
 * @property clob $Observaciones
 * @property integer $OrdenId
 * @property integer $ProveedorId
 * @property integer $Status
 * @property integer $OrdenDeCompraId
 * @property string $EsFlete
 * @property string $EsManoDeObra
 * @property string $EsComercializacion
 * @property string $PlazoDeEntregaComentario
 * @property integer $PlazoDeEntrega
 * @property string $LugarDeEntrega
 * @property date $FechaDeEntrega
 * @property OrdenDeTrabajo $Orden
 * @property Proveedor $Proveedor
 * @property OrdenDeCompra $OrdenDeCompra
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseInsumo extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('insumo');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Nombre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('Cantidad', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('PrecioUnitarioSinIVA', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('Elegido', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('CondicionDePago', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('FormaDePago', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Observaciones', 'clob', 65535, array(
             'type' => 'clob',
             'length' => '65535',
             ));
        $this->hasColumn('OrdenId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('ProveedorId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('Status', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => '1',
             'length' => '4',
             ));
        $this->hasColumn('OrdenDeCompraId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));
        $this->hasColumn('EsFlete', 'string', 2, array(
             'type' => 'string',
             'default' => 'NO',
             'fixed' => 1,
             'length' => '2',
             ));
        $this->hasColumn('EsManoDeObra', 'string', 2, array(
             'type' => 'string',
             'default' => 'NO',
             'fixed' => 1,
             'length' => '2',
             ));
        $this->hasColumn('EsComercializacion', 'string', 2, array(
             'type' => 'string',
             'default' => 'NO',
             'fixed' => 1,
             'length' => '2',
             ));
        $this->hasColumn('PlazoDeEntregaComentario', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('PlazoDeEntrega', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('LugarDeEntrega', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('FechaDeEntrega', 'date', null, array(
             'type' => 'date',
             ));


        $this->index('ordenid_idx', array(
             'fields' => 
             array(
              0 => 'OrdenId',
             ),
             ));
        $this->index('proveedorid_idx', array(
             'fields' => 
             array(
              0 => 'ProveedorId',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrdenDeTrabajo as Orden', array(
             'local' => 'OrdenId',
             'foreign' => 'Id',
             'onUpdate' => 'cascade'));

        $this->hasOne('Proveedor', array(
             'local' => 'ProveedorId',
             'foreign' => 'Id',
             'onUpdate' => 'cascade'));

        $this->hasOne('OrdenDeCompra', array(
             'local' => 'OrdenDeCompraId',
             'foreign' => 'Id'));
    }
}