<?php

class IDS_View_Smarty implements IDS_IView
{
    private $_smarty;
    
    public function __construct( Smarty $engine )
    {
        $this->_smarty = $engine;
    }
    /**
     * assigns values to template variables
     *
     * @param array|string $tpl_var the template variable name(s)
     * @param mixed $value the value to assign
     */
    function Assign($tpl_var, $value = null)
    {
        $this->_smarty->assign( $tpl_var, $value );
    }

    /**
     * assigns values to template variables by reference
     *
     * @param string $tpl_var the template variable name
     * @param mixed $value the referenced value to assign
     */
    function AssignByRef($tpl_var, &$value)
    {
        $this->_smarty->assign_by_ref($tpl_var, $value);
    }

    /**
     * appends values to template variables
     *
     * @param array|string $tpl_var the template variable name(s)
     * @param mixed $value the value to append
     */
    function Append($tpl_var, $value=null, $merge=false)
    {
        $this->_smarty->append( $tpl_var, $value, $merge );
    }

    /**
     * appends values to template variables by reference
     *
     * @param string $tpl_var the template variable name
     * @param mixed $value the referenced value to append
     */
    function AppendByRef($tpl_var, &$value, $merge=false)
    {
        $this->_smarty->append_by_ref($tpl_var, $value, $merge);
    }


    /**
     * clear the given assigned template variable.
     *
     * @param string $tpl_var the template variable to clear
     */
    function ClearAssign($tpl_var)
    {
        $this->_smarty->clear_assign( $tpl_var );
    }


    /**
     * Registers custom function to be used in templates
     *
     * @param string $function the name of the template function
     * @param string $function_impl the name of the PHP function to register
     */
    function RegisterFunction($function, $function_impl, $cacheable=true, $cache_attrs=null)
    {
        $this->_smarty->register_function($function, $function_impl, $cacheable, $cache_attrs);
    }

    /**
     * Unregisters custom function
     *
     * @param string $function name of template function
     */
    function UnregisterFunction($function)
    {
        $this->_smarty->unregister_function($function);
    }

    /**
     * Registers object to be used in templates
     *
     * @param string $object name of template object
     * @param object &$object_impl the referenced PHP object to register
     * @param null|array $allowed list of allowed methods (empty = all)
     * @param boolean $smarty_args smarty argument format, else traditional
     * @param null|array $block_functs list of methods that are block format
     */
    function RegisterObject($name, object $object, $allowedMethods = array(),  $blockedMethods = array())
    {
        $this->_smarty->register_object($name, $object, $allowedMethods, true, $blockedMethods);
    }

    /**
     * Unregisters object
     *
     * @param string $object name of template object
     */
    function UnregisterObject($object)
    {
        $this->_smarty->unregister_object($object);
    }


    /**
     * Registers block function to be used in templates
     *
     * @param string $block name of template block
     * @param string $block_impl PHP function to register
     */
    function RegisterBlock($block, $block_impl, $cacheable=true, $cache_attrs=null)
    {
        $this->_smarty->register_block($block, $block_impl, $cacheable, $cache_attrs);
    }

    /**
     * Unregisters block function
     *
     * @param string $block name of template function
     */
    function UnregiterBlock($block)
    {
        $this->_smarty->unregister_block( $block );
    }

    /**
     * Registers compiler function
     *
     * @param string $function name of template function
     * @param string $function_impl name of PHP function to register
     */
    function RegisterCompilerFunction($function, $function_impl, $cacheable=true)
    {
        $this->_smarty->register_compiler_function($function, $function_impl, $cacheable);
    }

    /**
     * Unregisters compiler function
     *
     * @param string $function name of template function
     */
    function UnregisterCompiledFunction($function)
    {
        $this->_smarty->unregister_compiler_function($function);
    }

    /**
     * Registers modifier to be used in templates
     *
     * @param string $modifier name of template modifier
     * @param string $modifier_impl name of PHP function to register
     */
    function RegisterModifier($modifier, $modifier_impl)
    {
        $this->_smarty->register_modifier($modifier, $modifier_impl);
    }

    /**
     * Unregisters modifier
     *
     * @param string $modifier name of template modifier
     */
    function UnregisterModifier($modifier)
    {
        $this->_smarty->unregister_modifier($modifier);
    }

    /**
     * Registers a resource to fetch a template
     *
     * @param string $type name of resource
     * @param array $functions array of functions to handle resource
     */
    function RegisterResource($type, $functions)
    {
        $this->_smarty->register_resource($type, $functions);
    }

    /**
     * Unregisters a resource
     *
     * @param string $type name of resource
     */
    function UnregisterResource($type)
    {
        $this->_smarty->unregister_resource($type);
    }

    /**
     * Registers a prefilter function to apply
     * to a template before compiling
     *
     * @param callback $function
     */
    function RegisterPrefilter($function)
    {
        $this->_smarty->register_prefilter($function);
    }

    /**
     * Unregisters a prefilter function
     *
     * @param callback $function
     */
    function UnregisterPrefilter($function)
    {
        $this->_smarty->unregister_prefilter($function);
    }

    /**
     * Registers a postfilter function to apply
     * to a compiled template after compilation
     *
     * @param callback $function
     */
    function RegisterPostfilter($function)
    {
        $this->_smarty->register_postfilter($function);
    }

    /**
     * Unregisters a postfilter function
     *
     * @param callback $function
     */
    function UnregisterPostfilter($function)
    {
        $this->_smarty->unregister_postfilter( $function );
    }

    /**
     * Registers an output filter function to apply
     * to a template output
     *
     * @param callback $function
     */
    function RegisterOutputfilter($function)
    {
        $this->_smarty->register_outputfilter($function);
    }

    /**
     * Unregisters an outputfilter function
     *
     * @param callback $function
     */
    function UnregisterOutputfilter($function)
    {
        $this->_smarty->unregister_outputfilter($function);
    }

    /**
     * load a filter of specified type and name
     *
     * @param string $type filter type
     * @param string $name filter name
     */
    function LoadFilter($type, $name)
    {
        $this->_smarty->load_filter($type, $name);
    }

    /**
     * clear cached content for the given template and cache id
     *
     * @param string $tpl_file name of template file
     * @param string $cache_id name of cache_id
     * @param string $compile_id name of compile_id
     * @param string $exp_time expiration time
     * @return boolean
     */
    function ClearCache($tpl_file = null, $cache_id = null, $compile_id = null, $exp_time = null)
    {
        return $this->_smarty->clear_cache($tpl_file, $cache_id, $compile_id, $exp_time);
    }


    /**
     * clear the entire contents of cache (all templates)
     *
     * @param string $exp_time expire time
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    function ClearAllCache($exp_time = null)
    {
        return $this->_smarty->clear_all_cache($exp_time);
    }


    /**
     * test to see if valid cache exists for this template
     *
     * @param string $tpl_file name of template file
     * @param string $cache_id
     * @param string $compile_id
     * @return string|false results of {@link _read_cache_file()}
     */
    function IsCached($tpl_file, $cache_id = null, $compile_id = null)
    {
        return $this->_smarty->is_cached($tpl_file, $cache_id, $compile_id);
    }


    /**
     * clear all the assigned template variables.
     *
     */
    function ClearAllAssign()
    {
        $this->_smarty->clear_all_assign();
    }

    /**
     * clears compiled version of specified template resource,
     * or all compiled template files if one is not specified.
     * This function is for advanced use only, not normally needed.
     *
     * @param string $tpl_file
     * @param string $compile_id
     * @param string $exp_time
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    function ClearCompiledTpl($tpl_file = null, $compile_id = null, $exp_time = null)
    {
        return $this->_smarty->clear_compiled_tpl($tpl_file, $compile_id, $exp_time);
    }

    /**
     * Checks whether requested template exists.
     *
     * @param string $tpl_file
     * @return boolean
     */
    function TemplateExists($tpl_file)
    {
        return $this->_smarty->template_exists($tpl_file);
    }

    /**
     * Returns an array containing template variables
     *
     * @param string $name
     * @param string $type
     * @return array
     */
    function &GetTemplateVars($name=null)
    {
        return $this->_smarty->get_template_vars($name);
    }

    /**
     * Returns an array containing config variables
     *
     * @param string $name
     * @param string $type
     * @return array
     */
    function &GetConfigVars($name=null)
    {
        return $this->_smarty->get_config_vars($name);
    }

    /**
     * trigger Smarty error
     *
     * @param string $error_msg
     * @param integer $error_type
     */
    function TriggerError($error_msg, $error_type = E_USER_WARNING)
    {
        trigger_error("Smarty error: $error_msg", $error_type);
    }


    /**
     * executes & displays the template results
     *
     * @param string $resource_name
     * @param string $cache_id
     * @param string $compile_id
     */
    function Display($resource_name, $cache_id = null, $compile_id = null)
    {
        $this->_smarty->display($resource_name, $cache_id, $compile_id);
    }

    /**
     * executes & returns or displays the template results
     *
     * @param string $resource_name
     * @param string $cache_id
     * @param string $compile_id
     * @param boolean $display
     */
    function Fetch($resource_name, $cache_id = null, $compile_id = null, $display = false)
    {
        return $this->_smarty->fetch($resource_name, $cache_id, $compile_id, $display);
    }
    
    function Render( $template, array $params = null )
    {
        return $this->_smarty->fetch( $template, $params['cacheId'], $params['compileId'], false );
    }
    
    function Reset()
    {
        $this->ClearAllAssign();
    }
    
    function Param( $name = null )
    {
        if( is_null( $name ) )
        {
            return $this->_smarty->get_template_vars();
        }
        else
        {
            return $this->_smarty->get_template_vars($name);
        }
    }
    
    function ParamExists( $name )
    {
        return array_key_exists( $this->_smarty->_tpl_vars, $name );
    }
    
    function SetParam( $name, $value = null )
    {
        if( is_array( $name ) )
        {
            $this->_smarty->assign( $name );
        }
        else
        {
            $this->_smarty->assign( $name, $value );
        }
    }
    
    function RemoveParam( $name )
    {
        $this->_smarty->clean_assign($name);
    }
    
    function RemoveAllParams()
    {
        $this->_smarty->clean_all_assign();
    }

    /**
     * load configuration values
     *
     * @param string $file
     * @param string $section
     * @param string $scope
     */
    function ConfigLoad($file, $section = null, $scope = 'global')
    {
        $this->_smarty->config_load($file, $section, $scope);
    }
    
    function ConfigLoadFromArray( $vars )
    {
        $this->_smarty->_config = array_merge( $vars, $this->_smarty->_config  );
    }

    /**
     * return a reference to a registered object
     *
     * @param string $name
     * @return object
     */
    function &GetRegisteredObject($name) {
        return $this->_smarty->get_registered_object($name);
    }
    
    public function GetObject( $name = null )
    {
        return $this->GetRegisteredObject( $name );
    }
    
    public function ObjectExists( $name )
    {
        return array_key_exists($this->_smarty->_reg_objects, $name );
    }
    
    public function RemoveAllObjects()
    {
        $this->_smarty->_reg_objects = array();
    }
    
    public function RemoveObject( $name )
    {
        $this->_smarty->unregister_object($name);
    }

    /**
     * clear configuration values
     *
     * @param string $var
     */
    function ClearConfig($var = null)
    {
        $this->_smarty->clear_config($var);
    }
    
}

?>
