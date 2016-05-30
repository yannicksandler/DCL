<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
class IDS_Controller_Action_Helper_View implements IDS_Controller_Action_IHelper
{
    const DEFAULT_PRIORITY  = 11;
    const DEFAULT_TEMPLATE_EXTENSION = '.tpl';
    
    private $_controller;
    
    private $_view;
    private $_viewTemplate;
    private $_renderView = true;
    
    private $_layout;
    private $_layoutView;
    private $_layoutMethod;
    private $_renderLayout  = true;
    
    private $_factory;
    
    public function __construct( IDS_Controller_IAction $controller  )
    {
        $this->_factory     = IDS_Factory_Manager::GetFactory();
        $this->_controller  = $controller;
        
        $this->SetView($this->_factory->CreateView());
    }
    
    public function GetDefaultPriority()
    {
        return self::DEFAULT_PRIORITY;
    }
    
    public function GetController()
    {
        return $this->_controller;
    }
    
    public function Layout()
    {
        return $this->_layout;
    }
    
    public function LayoutView()
    {
        if( !$this->_layoutView )
             $this->SetLayoutView( $this->_factory->CreateView());
             
        return $this->_layoutView;
    }
    
    /**
     * @deprecated usar en su lugar el metodo ContentView() de esta misma clase
     */
    public function View()
    {
        return $this->_view;
    }
    
    public function ContentView()
    {
        return $this->_view;
    }
    
    public function GetLayoutMethod()
    {
        return $this->_layoutMethod;
    }
    
    public function GetViewTemplate()
    {
        return $this->_viewTemplate;
    }
    
    public function Render()
    {
        if( $this->RenderView() )
        {
            $view   = $this->View();
        
            if( !$this->_viewTemplate )
            {
                $request    = $this->GetController()->GetRequest();
                
                $action     = $request->GetAction();
                $controller = $request->GetController();
                $module     = $request->GetModule();
                
                $this->SetViewTemplate( $module.DIRECTORY_SEPARATOR.
                                        $controller.DIRECTORY_SEPARATOR.
                                        $action.self::DEFAULT_TEMPLATE_EXTENSION );
                
            }
            
            $renderedView   = $view->Render($this->GetViewTemplate());
            

            if( $this->RenderLayout() )
            {
                if( $this->_layout )
                {
                    $layout         = $this->_layout;
                    $layoutMethod   = $this->GetLayoutMethod();
                }
                else
                {
                    $layout         = $this->_factory->GetLoader()->LoadClass( $view->Param('IDS_Layout_Class'),
                                                                               array( $this->_layoutView ) );
                    $layoutMethod   = $view->Param('IDS_Layout_Method');
                }
                
                $layoutView =   $this->LayoutView();
                $layoutView->SetParam( 'Main', $renderedView );
                
                $layout->SetView( $layoutView );
                
                $renderedView       = $layout->Render( $layoutMethod );
            }
            
            return $renderedView;
        }
    }
    
    public function RenderLayout( $renderLayout = null )
    {
        if( is_null( $renderLayout ) )
        {
            return $this->_renderLayout;
        }
        else
        {
            $this->_renderLayout = (bool)$renderLayout;
        }
    }
    
    public function RenderView( $renderView = null )
    {
        if( is_null( $renderView ) )
        {
            return $this->_renderView;
        }
        else
        {
            $this->_renderView = (bool)$renderView;
        }
    }
    
    public function EventPostExecute()
    {
        $rendered   = $this->Render();
        $response   = $this->_controller->GetResponse();
        
        $response->SetResponse($rendered);
    }

	public function EventPostInit()
    {
        
    }

	public function EventPreExecute()
    {
        
    }

	public function EventPreInit()
    {
        
    }
    
    public function SetController( IDS_Controller_IAction $controller )
    {
        $this->_controller = $controller;
    }
    
    public function SetLayout(  IDS_Layout_Abstract $layout )
    {
        $this->_layout  = $layout;
    }
    
    public function SetView( IDS_IView $view )
    {
        $this->_view    = $view;
    }
    
     public function SetLayoutMethod( $layoutMethod )
    {
        $this->_layoutMethod    = $layoutMethod;
    }
    
    public function SetLayoutView( IDS_IView $view )
    {
        $this->_layoutView = $view;
    }
    
    public function SetViewTemplate( $tpl )
    {
        $this->_viewTemplate    = $tpl;
    }
} 
?>