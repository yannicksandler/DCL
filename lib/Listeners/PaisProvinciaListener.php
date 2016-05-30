<?php
    class Listeners_PaisProvinciaListener extends Doctrine_Record_Listener
    {
        public function preSave( Doctrine_Event $event )
        {
            $invoker    = $event->getInvoker();
            
            if( $invoker->ProvinciaId )
            {
                $invoker->OtraProvincia = null;
            }
            
            if( $invoker->LocalidadId )
            {
                $invoker->OtraLocalidad = null;
            }
        }
    }
?>