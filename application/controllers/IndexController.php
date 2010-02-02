<?php

class IndexController extends Zend_Controller_Action
{
	private $modelPrefix = 'Default_Model_';
	private $formPrefix = 'Default_Form_';
	private $model = null;

	public function listAction(){
		$action= $this->modelPrefix.$this->model;
		if (class_exists($action)) {
			$modelInstance =new $action();
			$this->setData($modelInstance, $modelInstance->getDependentTables());			
		} else {
			// throw exception
		}
	}
	
	public function addAction(){
		$this->addValues($this->model);		
	}
	
	public function deleteAction()
	{
		# code...
	}
	
	public function editAction()
	{
		# code...
	}
	
    public function init(){
		$this->model = $this->getRequest()->getParam('model');
	}

    public function indexAction(){
    }

	private function setData($model, $dependentData=array()){
		$data = $model->fetchAll();
		$this->view->placeholder('dataGrid')->append(
			$this->view->partial('partials/_data.phtml',
				array('data' => $data,
					'dependentData' => $dependentData)));
		$link = $this->view->url(array(
			'module'=>'default', 
			'controller'=>$this->getRequest()->getParam('controller'),
			'action'=>$this->getRequest()->getParam('action'),
			'add'=>'new',
			), '', true);
			$this->view->placeholder('link')->append('<a href='.$link.'>Add new value</a>');
	}

    private function addValues($name){
		$formName = $this->formPrefix.$name;
		$modelName = $this->modelPrefix.$name;
		$form = new $formName();
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new $modelName();
				if (method_exists($model, 'save'))
					$model->save($form->getValues());
				else
					$model->insert($form->getValues());
                return $this->_helper->redirector($this->getRequest()->getParam('action'));
            }
        }
		$this->view->placeholder('inputForm')->append(
			$this->view->partial('partials/_form.phtml',
				array('form' => $form)));
    }
	
}