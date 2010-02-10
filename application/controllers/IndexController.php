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
			$this->setData($modelInstance);			
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
		if ($id && class_exists($activeModel, true)) {
			$modelInstance =new $activeModel();
			$message = $modelInstance->deleteValues($id)?'<div class="success">successfully deleted values</div>':'<div class="error">Problem deleting values for id = '.$id.' in '.$this->model.'.</div>';
			$this->view->actionResponse=$message;
			$this->view->backLink = $this->view->url(array(
				'module'=>'default', 
				'controller'=>$this->getRequest()->getParam('controller'),
				'action'=>'list',
				'model'=>$this->model
				), '', true);
		} else {
			throw new Exception ('Problem deleting values for id = '.$id.' in Model '.$activeModel.'.');
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

	private function setData($model){
		$data = $model->fetchAll();
		$editURL = $this->view->url(array(
			'module'=>'default', 
			'controller'=>$this->getRequest()->getParam('controller'),
			'action'=>'edit',
			'model'=>$this->model
			), '', true);
		$deleteURL = $this->view->url(array(
			'module'=>'default', 
			'controller'=>$this->getRequest()->getParam('controller'),
			'action'=>'delete',
			'model'=>$this->model
			), '', true);
		$this->view->placeholder('dataGrid')->append(
			$this->view->partial('partials/_data.phtml', array('data' => $model->getPrintableArray(), 'editURL'=>$editURL, 'deleteURL' =>$deleteURL, 'caption'=>$this->model)));
		$link = $this->view->url(array(
			'module'=>'default', 
			'controller'=>$this->getRequest()->getParam('controller'),
			'action'=>'add',
			'model'=>$this->model
			), '', true);
		$this->view->placeholder('link')->append('<a href='.$link.'>Add new value</a>');
	}

    private function addValues($name){
		$this->view->formResponse = '';
		$request = $this->getRequest();
		$this->prepareForm($name);
        if ($request->isPost()) {
            if ($this->currentForm->isValid($request->getPost())) {
				if (method_exists($this->currentModel, 'save'))
					$this->currentModel->save($this->currentForm->getValues());
				else
					$this->currentModel->insert($this->currentForm->getValues());
				$this->view->formResponse='<div class="success">Values added</div>';
				$this->form=$this->prepareForm($name);
                // return $this->_helper->redirector->gotoSimple('list', null, null, array('model'=>$this->model));
            }
			else {$this->view->formResponse='<div class="error">Sorry, there was a problem with your submission. Please check the following:</div>';}
        }
		$this->view->form = $this->currentForm;
    }

    private function editValues($name){
		$this->view->formResponse = '';
		$request = $this->getRequest();
		$this->prepareForm($name);
        if ($request->isPost()) {
            if ($this->currentForm->isValid($request->getPost())) {
				if (method_exists($this->currentModel, 'updateOneRow'))
					$this->currentModel->updateOneRow($this->currentForm->getValues());
            }
 			else {
				$this->view->formResponse='<div class="error">Sorry, there was a problem with your submission. Please check the following:</div>';
				$this->view->form = $this->currentForm;
				return;
				}
			return $this->_helper->redirector->gotoSimple('list', null, null, array('model'=>$this->model));
        }
		else {
			$id = $request->getParam('id');
			$this->currentForm->populate($this->currentModel->fetchOneRow($id));
			$this->view->form = $this->currentForm;
    		}
	}

	private function prepareForm($name){
		$formName = $this->formPrefix.$name;
		$modelName = $this->modelPrefix.$name;
		if (!class_exists($formName, true) || !class_exists($modelName, true))
			throw new Exception('Invalid model specified.');
		$this->currentForm = new $formName();
		$this->currentModel = new $modelName();
		
	}

}