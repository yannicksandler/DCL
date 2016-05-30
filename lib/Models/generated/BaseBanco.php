<?php

/**
 * BaseBanco
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Nombre
 * @property string $Codigo
 * @property string $TipoBanco
 * @property string $CUIT
 * @property string $NumeroDeCuenta
 * @property decimal $SaldoCuenta
 * @property string $UltimoNumeroCheque
 * @property Doctrine_Collection $CuentaCorriente
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseBanco extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('banco');
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
        $this->hasColumn('Codigo', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('TipoBanco', 'string', 1, array(
             'type' => 'string',
             'notnull' => true,
             'fixed' => 1,
             'length' => '1',
             ));
        $this->hasColumn('CUIT', 'string', 11, array(
             'type' => 'string',
             'length' => '11',
             ));
        $this->hasColumn('NumeroDeCuenta', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('SaldoCuenta', 'decimal', 16, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'length' => '16',
             ));
        $this->hasColumn('UltimoNumeroCheque', 'string', 255, array(
             'type' => 'string',
             'default' => 0,
             'length' => '255',
             ));


        $this->index('UQ_banco', array(
             'fields' => 
             array(
              'Codigo' => 
              array(
              'sorting' => 'ASC',
              ),
              'TipoBanco' => 
              array(
              'sorting' => 'ASC',
              ),
              'NumeroDeCuenta' => 
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
        $this->hasMany('BancoCuentaCorriente as CuentaCorriente', array(
             'local' => 'Id',
             'foreign' => 'BancoId'));
    }
}