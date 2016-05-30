<?php
    class Backend_Controllers_ConfigController extends IDS_Controller_Action_Standard
    {
        protected $view;
            
        public function Init()
        {
            //$this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function ModelImportAction()
        {
            
            $config     = $this->GetConfig();
            
            $conn       = Doctrine_Manager::connection( 'mysql://'.$config->Get('db.user_aux').':'.$config->Get('db.pass_aux').
                                                        '@'.$config->Get('db.host_aux').'/'.$config->Get('db.name_aux') ); 
            $manager    = Doctrine_Manager::getInstance();
            
            $manager->setAttribute(Doctrine::ATTR_EXPORT, Doctrine::EXPORT_ALL);
            $manager->setAttribute(Doctrine::ATTR_IDXNAME_FORMAT, '%s_idx');
            $manager->setAttribute(Doctrine::ATTR_QUOTE_IDENTIFIER, true );
            
            $conn->dropDatabase();
            $conn->createDatabase();
            
            Doctrine_Core::generateModelsFromYaml(
                                                    APP_ROOT_PATH.'/config/schema.yml',
                                                    APP_ROOT_PATH.'/lib/Models',
                                                    array
                                                    (
                                                        'generateTableClasses'  => true,
                                                        'generateBaseClasses'   => true,
                                                        'baseClassesDirectory'  => 'generated'
                                                    )
                                                );
            
            Doctrine_Core::createTablesFromModels(APP_ROOT_PATH.'/lib/Models');
            
            
            echo 'MODELOS CREADOS CORRECTAMENTE';
        }
    }
?>