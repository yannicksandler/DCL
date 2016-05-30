<?php
class Listeners_AlumnoProductoListener extends Doctrine_Record_Listener
{
    public function postInsert(Doctrine_Event $event)
    {
        //echo 'record inserted con un postInsert, asignar materias del template...';

        $service = new Classes_AlumnoProductoService();
        
        $AlumnoProducto =   Doctrine_Core::getTable('AlumnoProducto')->find($event->getInvoker()->Id);
        
        $service->AsignarPlan($AlumnoProducto);

    }
}
?>