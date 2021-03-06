<?php

/**
 * Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Usuario extends BaseUsuario
{
	public function setUp()
    {
        parent::setUp();

        $this->hasAccessorMutator('FechaAlta', 'FechaAltaAccessor', 'FechaAltaMutator');
        $this->hasAccessorMutator('FechaBaja', 'FechaBajaAccessor', 'FechaBajaMutator');
        
    }
    
    public function FechaAltaAccessor()
    {
    	$timestamp	=	$this->_get('FechaAlta');
    	
    	if ($timestamp)
    	{
        	$date 	=	new Classes_DateHelper();
        	
        	return $date->toViewFormat($timestamp);
    	}
    	else
    		return '';
    }
    
    
    public function FechaAltaMutator( $value )
    {
        $date 	=	new Classes_DateHelper();
        
        $this->_set('FechaAlta', $date->fromViewFormat($value));
    }
    
    
	public function FechaBajaAccessor()
    {
    	$timestamp	=	$this->_get('FechaBaja');
    	
    	if ($timestamp)
    	{
        	$date 	=	new Classes_DateHelper();
        	
        	return $date->toViewFormat($timestamp);
    	}
    	else
    		return '';
    }
    
    
    public function FechaBajaMutator( $value )
    {
        $date 	=	new Classes_DateHelper();
        
        $this->_set('FechaBaja', $date->fromViewFormat($value));
    }
	
    public function GetAccionesPermitidas()
    {
    	$q	=	Doctrine_Query::create()
					->from('UsuarioPerfilControllerAction ca')
					->where('ca.UsuarioPerfilId = ?', $this->UsuarioPerfil->Id);
		return $q->execute();
    }
    
    public function IsPerfilAdministrador()
    {
    	if($this->UsuarioPerfil->Nombre == 'Administrador')
    		return true;
    	
    	return false;
    }
    
    public function GetNombrePerfil()
    {
    	return $this->UsuarioPerfil->Nombre;
    }
    
    public function IsPerfilVentas()
    {
    	if($this->UsuarioPerfil->Nombre == 'Ventas')
    		return true;
    	 
    	return false;
    }
}