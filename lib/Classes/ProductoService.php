<?php
    class Classes_ProductoService
    {
        public function __contruct()
        {

        }
        
        /**
         * 
         */
        public function RequiereColegio($ProductoId)
        {
            $Producto =  Doctrine_Core::getTable('Producto')->find($ProductoId);
            
            if ($Producto->TipoProducto->RequiereColegio == 'S')
                return TRUE;
            else
                return FALSE;
        }
    
    }    
?>