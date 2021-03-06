<?php

/**
 * BaseNotaCredito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property integer $Numero
 * @property integer $ClienteId
 * @property integer $TipoIvaId
 * @property date $Fecha
 * @property decimal $Importe
 * @property string $Descripcion
 * @property date $FechaUtilizacionPago
 * @property date $FechaAnulacion
 * @property integer $OrdenDePagoId
 * @property Cliente $Cliente
 * @property TipoIva $TipoIva
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseNotaCredito extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('nota_credito');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Numero', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('ClienteId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('TipoIvaId', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('Fecha', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('Importe', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('Descripcion', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('FechaUtilizacionPago', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('FechaAnulacion', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('OrdenDePagoId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
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
             'foreign' => 'Id',
             'onUpdate' => 'cascade'));
    }
}