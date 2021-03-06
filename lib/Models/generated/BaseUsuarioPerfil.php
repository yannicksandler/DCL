<?php

/**
 * BaseUsuarioPerfil
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Id
 * @property string $Nombre
 * @property string $UrlInicio
 * @property Doctrine_Collection $Usuarios
 * @property Doctrine_Collection $UsuarioPerfilMenus
 * @property Doctrine_Collection $UsuarioPerfilControllerActions
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseUsuarioPerfil extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario_perfil');
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
        $this->hasColumn('UrlInicio', 'string', 255, array(
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
        $this->hasMany('Usuario as Usuarios', array(
             'local' => 'Id',
             'foreign' => 'UsuarioPerfilId'));

        $this->hasMany('UsuarioPerfilMenu as UsuarioPerfilMenus', array(
             'local' => 'Id',
             'foreign' => 'UsuarioPerfilId'));

        $this->hasMany('UsuarioPerfilControllerAction as UsuarioPerfilControllerActions', array(
             'local' => 'Id',
             'foreign' => 'UsuarioPerfilId'));
    }
}