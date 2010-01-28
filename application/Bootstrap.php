<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDoctype()
	    {
			$this->bootstrap('view');
			        $view = $this->getResource('view');
			        $view->doctype('XHTML1_STRICT');
	    }

	protected function _initAutoload()
	    {
	        $autoloader = new Zend_Application_Module_Autoloader(array(
	            'namespace' => 'Default_',
	            'basePath'  => dirname(__FILE__),
	        ));
	        return $autoloader;
	    }
	
		protected function _initNavigation(){
			$this->bootstrap('layout');
			$layout = $this->getResource('layout');
			$view = $layout->getView();
			// $view->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');
			// $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer(); 
			// $viewRenderer->setView($view); 
			// Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
			$config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
			$container = new Zend_Navigation($config);
			$view->navigation($container);
		}
}