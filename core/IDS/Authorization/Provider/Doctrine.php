<?php
    class IDS_Authorization_Provider_Doctrine implements IDS_Authorization_IProvider
    {
        
        private $_table;
        private $_conditions    = array();
        private $_loginData;
        
        public function __construct( Doctrine_Table $table )
        {
            $this->SetTable( $table );
        }
        
        public function addCondition( $field, $value )
        {
            array_push( $this->_conditions, array( 'field' => $field, 'value' => $value ) );
        }
        
        public function GetLoginData()
        {
            return $this->_loginData;
        }
        
        public function SetLoginData( Doctrine_Record $data )
        {
            $this->_loginData   = $data;
        }
        
        public function Authorize()
        {
            $q   = $this->GetTable()->CreateQuery();
            
            if( count( $this->_conditions ) )
            {
                foreach( $this->_conditions as $key => $condition )
                {
                    $q->addWhere( $condition['field'] . ' = ? ',  $condition['value'] );
                }
                
            }
            
            $result = $q->Limit(1)->FetchOne();
            
            if( $result )
            {
                $this->SetLoginData( $result );
                return true;  
            }
            
            return false;
        }
        
        public function GetTable()
        {
            return $this->_table;
        }
        
        public function SetTable( Doctrine_Table $table )
        {
            $this->_table   = $table;
        }
    }
?>