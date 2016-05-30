<?php

/**
 * BaseCheque
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property char $Tipo
 * @property boolean $EsPropio
 * @property string $Numero
 * @property integer $BancoId
 * @property string $BancoCodigo
 * @property string $Sucursal
 * @property string $Localidad
 * @property string $Cuenta
 * @property string $Firmante
 * @property string $CUIT
 * @property string $Estado
 * @property date $FechaCreacion
 * @property date $FechaEmision
 * @property date $FechaCobro
 * @property date $FechaVencimiento
 * @property date $FechaAnulacion
 * @property decimal $Importe
 * @property integer $ClienteId
 * @property integer $ProveedorId
 * @property Cliente $Cliente
 * @property Proveedor $Proveedor
 * @property Doctrine_Collection $Pagos
 * @property Doctrine_Collection $CobranzaDetalles
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseCheque extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('cheque');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Tipo', 'char', 1, array(
             'type' => 'char',
             'length' => '1',
             ));
        $this->hasColumn('EsPropio', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('Numero', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('BancoId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));
        $this->hasColumn('BancoCodigo', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Sucursal', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Localidad', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Cuenta', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Firmante', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('CUIT', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Estado', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '45',
             ));
        $this->hasColumn('FechaCreacion', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('FechaEmision', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('FechaCobro', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('FechaVencimiento', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('FechaAnulacion', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('Importe', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('ClienteId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));
        $this->hasColumn('ProveedorId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));


        $this->index('UQ_numero_banco', array(
             'fields' => 
             array(
              'Numero' => 
              array(
              'sorting' => 'ASC',
              ),
              'BancoCodigo' => 
              array(
              'sorting' => 'ASC',
              ),
             ),
             'type' => 'unique',
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

        $this->hasOne('Proveedor', array(
             'local' => 'ProveedorId',
             'foreign' => 'Id'));

        $this->hasMany('Pago as Pagos', array(
             'local' => 'Id',
             'foreign' => 'ChequeId'));

        $this->hasMany('CobranzaDetalle as CobranzaDetalles', array(
             'local' => 'Id',
             'foreign' => 'ChequeId'));
    }
}