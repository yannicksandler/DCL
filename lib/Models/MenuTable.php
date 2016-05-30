<?php
/**
 */
class MenuTable extends Doctrine_Table
{
	public function GetSelected( $uri )
	{
            if(isset($uri))
 			{
 				$url	=	array();
 				
 				$url	=	explode("/", $uri);
 				
 				// /controller/action
 				$acceso	=	'/'.$url[1].'/'.$url[2];
 				
 				// controlar acceso por controlador, menos fino
 				//$controllerName	=	$url[1];
 				
 				$menuItem	= Doctrine_Query::create()
 						->from('Menu')
 						->addWhere("UrlDefault LIKE ?", '%'.$acceso.'%');
 						
 				
 				return $menuItem->FetchOne();
 			}
 			else
 				return false;
	}       
	
}