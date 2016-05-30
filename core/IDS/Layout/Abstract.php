<?php
    abstract class IDS_Layout_Abstract
    {
        private $_view;
        private $_method;
        private $_template;
        
        public function __construct( IDS_IView $view = null )
        {
            $this->_view = $view;
        }
        
        abstract public function DefaultLayout();
        
        public function GetMethod()
        {
            return $this->_layout ? $this->_layout.'Layout' : 'DefaultLayout';
        }
        
        public function GetTemplate()
        {
            return $this->_template;
        }
        
        public function Render( $layout = null )
        {
            if( !is_null( $layout ) )
            {
                $this->SetMethod($layout);
            }
            
            $layoutMethod   = $this->GetMethod();
            
            $this->$layoutMethod();
            
            return $this->View()->Render( $this->_template );
        }
        
        public function SetMethod( $layout )
        {   
            if( method_exists( $this, $layout.'Layout') )
            {
                $this->_layout = $layout;
            }
            else
            {
                throw new IDS_Layout_Exception('Method '.$layout.' not defined in class '.get_class($this));
            }
        }
        
        public function SetTemplate( $tpl )
        {
            $this->_template = $tpl;
        }
        
        public function SetView(IDS_IView $view)
        {
            $this->_view    = $view;
        }
        
        public function View()
        {
            return $this->_view;
        }
    }
?>