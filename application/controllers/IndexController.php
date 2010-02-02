<?php

class IndexController extends Zend_Controller_Action
{
	//TODO get namespace from bootloader?
	private $modelPrefix = 'Default_Model_';
	private $formPrefix = 'Default_Form_';
	private $model = null;

	public function listAction(){
		$activeModel= $this->modelPrefix.$this->model;
		if (class_exists($activeModel, true)) {
			$modelInstance =new $activeModel();
			$this->setData($modelInstance, $modelInstance->getDependentTables());			
		} else {
			throw new Exception ('Model '.$activeModel.' does not exist.');
		}
	}
	
	public function addAction(){
		$this->addValues($this->model);		
	}
	
	public function deleteAction(){
		$activeModel= $this->modelPrefix.$this->model;
		$id = $this->getRequest()->getParam('id');
		if (class_exists($activeModel, true)) {
			$modelInstance =new $activeModel();
			$modelInstance->deleteValues($id);
		} else {
			throw new Exception ('Model '.$activeModel.' does not exist.');
		}
	}
	
	public function editAction(){
		$this->editValues($this->model);
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
			'action'=>'add',
			'model'=>$this->getRequest()->getParam('model'),
			), '', true);
			$this->view->placeholder('link')->append('<a href='.$link.'>Add new value</a>');
	}

    private function addValues($name){
		$formName = $this->formPrefix.$name;
		$modelName = $this->modelPrefix.$name;
		if (!class_exists($formName, true) || !class_exists($modelName, true)) {
			throw new Exception('Invalid model specified.');
		}
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

    private function editValues($name){
		$request = $this->getRequest();
		$id = $request->getParam('id');
		$formName = $this->formPrefix.$name;
		$modelName = $this->modelPrefix.$name;
		if (!class_exists($formName, true) || !class_exists($modelName, true)) {
			throw new Exception('Invalid model specified.');
		}
		$form = new $formName();
		$model = new $modelName();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new $modelName();
				if (method_exists($model, 'updateOneRow'))
					$model->updateOneRow($form->getValues());
				// else
					// $model->insert($form->getValues());
                // return $this->_helper->redirector($this->getRequest()->getParam('action'));
            }
        }

else {
		$form->populate($model->fetchOneRow($id));
		$this->view->placeholder('inputForm')->append(
			$this->view->partial('partials/_form.phtml',
				array('form' => $form)));
    }
}

	
}