<?php

/**
 * BaseUsuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Usuario
 * @property string $Password
 * @property string $Email
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Cargo
 * @property integer $UsuarioPerfilId
 * @property UsuarioPerfil $UsuarioPerfil
 * @property Doctrine_Collection $OrdenesDeTrabajo
 * @property Doctrine_Collection $Notificaciones
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseUsuario extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('Id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Usuario', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('Password', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('Email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Nombre', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Apellido', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Cargo', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('UsuarioPerfilId', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => '4',
             ));


        $this->index('perfilusuarioid_idx', array(
             'fields' => 
             array(
              0 => 'UsuarioPerfilId',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('UsuarioPerfil', array(
             'local' => 'UsuarioPerfilId',
             'foreign' => 'Id'));

        $this->hasMany('OrdenDeTrabajo as OrdenesDeTrabajo', array(
             'local' => 'Id',
             'foreign' => 'CreadorUsuarioId'));

        $this->hasMany('Notificacion as Notificaciones', array(
             'local' => 'Id',
             'foreign' => 'DestinoUsuarioId'));
    }
}