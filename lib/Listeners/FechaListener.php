<?php
    class Listeners_FechaListener extends Doctrine_Record_Listener
    {
    	
    	private $_dateFields;
    	
    	public function __construct( array $dateFields )
    	{
    		$this->_dateFields = $dateFields;	
    	}
    	
        public function preSave( Doctrine_Event $event )
        {
            $invoker    = $event->getInvoker();
            
            foreach( $this->_dateFields as $key => $field )
            {
            	if( $invoker->getTable()->hasColumn( $field ) )
            	{
            		
                	echo $invoker->$field;
            	}
            }

        }
    }

?>