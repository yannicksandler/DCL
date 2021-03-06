<?php

/**
 * BaseLiquidacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property date $FechaFactura
 * @property integer $NumeroFactura
 * @property decimal $Importe
 * @property string $Detalle
 * @property integer $OrdenDePagoId
 * @property OrdenDePago $OrdenDePago
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseLiquidacion extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('liquidacion');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('FechaFactura', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('NumeroFactura', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));
        $this->hasColumn('Importe', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'unsigned' => true,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('Detalle', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('OrdenDePagoId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
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
    }
}