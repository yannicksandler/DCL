<?php

/**
 * BaseTipoGasto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Nombre
 * @property Doctrine_Collection $Proveedores
 * @property Doctrine_Collection $FacturasCompra
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseTipoGasto extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('tipo_gasto');
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

        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Proveedor as Proveedores', array(
             'local' => 'Id',
             'foreign' => 'TipoGastoId'));

        $this->hasMany('FacturaCompra as FacturasCompra', array(
             'local' => 'Id',
             'foreign' => 'TipoGastoId'));
    }
}