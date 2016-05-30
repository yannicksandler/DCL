<?php
    class IDS_Doctrine_Table
    {
        protected $_table   = null;
        
        public function __construct( Doctrine_Table $table )
        {
            $this->SetTable( $table );
        }
        
        public function SetTable( Doctrine_Table $table )
        {
            $this->_table   = $table;
        }
        
        public function GetTable()
        {
            return $this->_table;
        }
        
        public function FindAll()
        {
            if( $this->_table instanceof IDS_Doctrine_Model_ISortable )
            {
                $q  = $this->_table->createQuery();
                $q->orderBy(    $this->_table->GetDefaultSortColumn(),
                                $this->_table->GetDefaultSort());
                    
                return $q->Execute();
            }
            else
            {
                return $this->_table->FindAll();
            }
        }
    }
?>