<?php
    class Classes_Trazabilidad
    {   
 
    	public function __construct()
        {
			  
        }
        
        public function AddLog($comment)
        {
        	/*
        	$a	=	new Classes_Session();
			$a->Session();
		
        	$now    =   new DateTime();
		
			$h	=	new UsuarioHistorial();
			$h->Fecha	=	$now->format('Y-m-d H:i:s');	
			$h->UsuarioId	=	$a->GetUser()->Id;
			
			$ip=$_SERVER['REMOTE_ADDR'] . ': ';
			
			$h->Comentario		=	$ip . $comment;
			
			
			$h->save();
			*/
        }
        
        /* guardar en archivo /var/log.txt */
        public function AddFileLog($comment)
        {
        	
        }
    }
?>