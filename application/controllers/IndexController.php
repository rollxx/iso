<?php

class IndexController extends Zend_Controller_Action
{
	//TODO get namespace from bootloader?
	private $modelPrefix = 'Default_Model_';
	private $formPrefix = 'Default_Form_';
	private $model = null;
    private $currentModel =null;
    private $currentForm =null;

	public function listAction(){
		$activeModel= $this->modelPrefix.$this->model;
		if (class_exists($activeModel)) {
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
		if ($id && class_exists($activeModel)) {
			$modelInstance =new $activeModel();
			$message = $modelInstance->deleteValues($id)?'<div class="success">successfully deleted values</div>':'<div class="error">Problem deleting values for id = '.$id.' in '.$this->model.'.</div>';
			$this->view->actionResponse=$message;
			$this->view->backLink = $this->view->url(array(
				'module'=>'default', 
				'controller'=>$this->getRequest()->getParam('controller'),
				'action'=>'list',
				'model'=>$this->model
				), '', true);
//			var_dump($this->getLuceneUrl());
			$this->updateEntryInSearch($this->getLuceneUrl());
		} else {
			throw new Exception ('Problem deleting values for id = '.$id.' in Model '.$activeModel.'.');
		}
	}
	
	public function editAction(){
		$this->editValues($this->model);
	}
	
	public function searchAction()
	{
		$query='EnumeratedConceptualDomain';
		$bootstrap = $this->getInvokeArg('bootstrap'); 
        $options = $bootstrap->getOption('lucene');
		$luceneDir=$options['dir'];
		$index = Zend_Search_Lucene::open($luceneDir);
		$results = $index->find($query);
		foreach ($results as $result) {
			var_dump($result->url);
		}
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
		$id=null;
        if ($request->isPost()) {
            if ($this->currentForm->isValid($request->getPost())) {
				if (method_exists($this->currentModel, 'save'))
					$id=$this->currentModel->save($this->currentForm->getValues());
				else
					$id=$this->currentModel->insert($this->currentForm->getValues());
				$this->view->formResponse='<div class="success">Values added</div>';
                var_dump($this->currentForm->getValues());
				$this->form=$this->prepareForm($name);
                // return $this->_helper->redirector->gotoSimple('list', null, null, array('model'=>$this->model));
				$this->addEntryToSearchIndex($this->getLuceneUrl($id), 'text', 'title', 'channeltitle');
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
				if (method_exists($this->currentModel, 'updateOneRow')){
					$this->currentModel->updateOneRow($this->currentForm->getValues());
					// $this->updateEntryInSearch($this->getLuceneUrl(), 'a','b','c');
				}
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
		if (!class_exists($formName) || !class_exists($modelName))
			throw new Exception('Invalid model specified.');
		$this->currentForm = new $formName();
		$this->currentModel = new $modelName();
		
	}
	
	// search part

	private function addEntryToSearchIndex($url, $contents, $name, $title=''){
		$bootstrap = $this->getInvokeArg('bootstrap'); 
        $options = $bootstrap->getOption('lucene');
		$luceneDir=$options['dir'];
		
	    $doc = new Zend_Search_Lucene_Document();

	    $doc->addField(Zend_Search_Lucene_Field::Text('url', $url));
	    $doc->addField(Zend_Search_Lucene_Field::Text('name',
	                                                  $name));
	    if($title != '')
	        $doc->addField(Zend_Search_Lucene_Field::Text('title', 
	                                                      $title));
	    $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', 
	                                                      $contents));

	    $newIndex = !is_dir($luceneDir);
	    $index = new Zend_Search_Lucene($luceneDir, $newIndex);
	    $index->addDocument($doc);
	    $index->commit();
	}
	
	private function updateEntryInSearch($url, $contents=null, $name=null, $title=null){
		$bootstrap = $this->getInvokeArg('bootstrap'); 
        $options = $bootstrap->getOption('lucene');
		$luceneDir=$options['dir'];
		
	    $index = new Zend_Search_Lucene($luceneDir);

		$hits=$index->find($url);
		foreach ($hits as $hit) {
			$index->delete($hit->id);
		}
		
		if(!$contents)
			return;

	    $doc = new Zend_Search_Lucene_Document();

	    $doc->addField(Zend_Search_Lucene_Field::Text('url', $url));
	    $doc->addField(Zend_Search_Lucene_Field::Text('name',
	                                                  $name));
	    if($title != '')
	        $doc->addField(Zend_Search_Lucene_Field::Text('title', 
	                                                      $title));
	    $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', 
	                                                      $contents));

	    $index->addDocument($doc);
	    $index->commit();		
	}
	
	private function getLuceneUrl($newid=null){
		var_dump($newid);
		$id = $newid?$newid:$this->getRequest()->getParam('id');
		$url=$this->view->url(array(
			'module'=>'default', 
			'controller'=>$this->getRequest()->getParam('controller'),
			'action'=>'edit',
			'model'=>$this->model,
			'id' =>$id
			), '', true);
		return $url;
	}
}

