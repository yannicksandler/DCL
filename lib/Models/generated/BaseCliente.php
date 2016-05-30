<?php

/**
 * BaseCliente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Nombre
 * @property string $RazonSocial
 * @property string $PersonaContacto
 * @property string $PersonaEmail
 * @property string $PersonaTelefono
 * @property string $RubroNombre
 * @property string $Observaciones
 * @property string $Cuit
 * @property string $Localidad
 * @property string $Direccion
 * @property string $CodigoPostal
 * @property string $Telefono
 * @property string $Fax
 * @property string $Email
 * @property integer $Status
 * @property integer $TipoIvaId
 * @property integer $RubroId
 * @property decimal $SaldoInicial
 * @property decimal $SaldoActual
 * @property TipoIva $TipoIva
 * @property Rubro $Rubro
 * @property Doctrine_Collection $OrdenesDeTrabajo
 * @property Doctrine_Collection $Facturas
 * @property Doctrine_Collection $Cobranzas
 * @property Doctrine_Collection $Cheques
 * @property Doctrine_Collection $NotasDebito
 * @property Doctrine_Collection $NotasCredito
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseCliente extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('cliente');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Nombre', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('RazonSocial', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('PersonaContacto', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('PersonaEmail', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('PersonaTelefono', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('RubroNombre', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Observaciones', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Cuit', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('Localidad', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Direccion', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('CodigoPostal', 'string', 45, array(
             'type' => 'string',
             'length' => '45',
             ));
        $this->hasColumn('Telefono', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Fax', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Status', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => '1',
             'length' => '4',
             ));
        $this->hasColumn('TipoIvaId', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('RubroId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));
        $this->hasColumn('SaldoInicial', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'unsigned' => true,
             'default' => 0,
             'length' => '10',
             ));
        $this->hasColumn('SaldoActual', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'length' => '10',
             ));


        $this->index('fk_cliente_Rubro1', array(
             'fields' => 
             array(
              0 => 'RubroId',
             ),
             ));
        $this->index('fk_cliente_TipoIva1', array(
             'fields' => 
             array(
              0 => 'TipoIvaId',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TipoIva', array(
             'local' => 'TipoIvaId',
             'foreign' => 'Id'));

        $this->hasOne('Rubro', array(
             'local' => 'RubroId',
             'foreign' => 'Id'));

        $this->hasMany('OrdenDeTrabajo as OrdenesDeTrabajo', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));

        $this->hasMany('Factura as Facturas', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));

        $this->hasMany('Cobranza as Cobranzas', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));

        $this->hasMany('Cheque as Cheques', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));

        $this->hasMany('NotaDebito as NotasDebito', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));

        $this->hasMany('NotaCredito as NotasCredito', array(
             'local' => 'Id',
             'foreign' => 'ClienteId'));
    }
}