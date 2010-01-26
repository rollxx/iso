<?php

class IndexController extends Zend_Controller_Action
{
    public function init(){
	}

    public function indexAction(){
    }

	public function conceptualDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ConceptualDomain(), 'Default_Model_ConceptualDomain');
		else
			$this->setData(new Default_Model_ConceptualDomain(), array('Default_Model_DataElementConcept'));
	}

	public function enumeratedConceptualDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_EnumeratedConceptualDomain(), 'Default_Model_EnumeratedConceptualDomain');
		else
			$this->setData(new Default_Model_EnumeratedConceptualDomain());
	}

	public function enumeratedConceptualDomainValueMeaningAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_EnumeratedConceptualDomainValueMeaning(), 'Default_Model_EnumeratedConceptualDomainValueMeaning');
		else
			$this->setData(new Default_Model_EnumeratedConceptualDomainValueMeaning());
	}

	public function enumeratedValueDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ConceptualDomain(), 'Default_Model_EnumeratedConceptualDomain');
		else
			$this->setData(new Default_Model_EnumeratedValueDomain());
	}

	public function enumeratedValueDomainPermissibleValueAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ConceptualDomain(), 'Default_Model_EnumeratedConceptualDomain');
		else
			$this->setData(new Default_Model_EnumeratedValueDomainPermissibleValue());
	}

	public function nonEnumeratedConceptualDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_NonEnumeratedConceptualDomain(), 'Default_Model_NonEnumeratedConceptualDomain');
		else
			$this->setData(new Default_Model_NonEnumeratedConceptualDomain());
	}

	public function nonEnumeratedValueDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_NonEnumeratedValueDomain(), 'Default_Model_NonEnumeratedValueDomain');
		else
			$this->setData(new Default_Model_NonEnumeratedValueDomain());
	}

	public function objectClassAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ObjectClass(), 'Default_Model_ObjectClass');
		else
			$this->setData(new Default_Model_ObjectClass());
	}

	public function permissibleValueAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_PermissibleValue(), 'Default_Model_PermissibleValue');
		else
			$this->setData(new Default_Model_PermissibleValue(), array('Default_Model_Value'));
	}

	public function propertyAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_Property(), 'Default_Model_Property');
		else
			$this->setData(new Default_Model_Property());
	}

	public function unitOfMeasureAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_UnitOfMeasure(), 'Default_Model_UnitOfMeasure');
		else
			$this->setData(new Default_Model_UnitOfMeasure(), array('Default_Model_Dimensionality'));
	}

	public function valueAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_Value(), 'Default_Model_Value');
		else
			$this->setData(new Default_Model_Value());
	}

	public function valueDomainAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ValueDomain(), 'Default_Model_ValueDomain');
		else
			$this->setData(new Default_Model_ValueDomain(), array('Default_Model_DataElement'));
	}

	public function valueMeaningAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_ValueMeaning(), 'Default_Model_ValueMeaning');
		else
			$this->setData(new Default_Model_ValueMeaning());
	}

	public function dataElementAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_DataElement(), 'Default_Model_DataElement');
		else
			$this->setData(new Default_Model_DataElement());
	}

	public function dataElementConceptAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_DataElementConcept(), array('Default_Model_DataElementConcept'));
		else
			$this->setData(new Default_Model_DataElementConcept(), array('Default_Model_DataElement'));
	}

	public function dimensionalityAction(){
		if ($this->checkRequest())
			$this->addValues(new Default_Form_Dimensionality(), 'Default_Model_Dimensionality');
		else
			$this->setData(new Default_Model_Dimensionality());
	}

	private function setData($model, $dependentData=array()){
		$data = $model->fetchAll();
		$this->view->placeholder('dataGrid')->append(
			$this->view->partial('partials/_data.phtml',
				array('data' => $data, 'dependentData' => $dependentData, 'visibleColumns' => $model->getVisibleColumns())));
	}

    private function addValues($form, $modelName){
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new $modelName($form->getValues());
                $model->insert($form->getValues());
                return $this->_helper->redirector($this->getRequest()->getParam('action'));
            }
        }
		$this->view->placeholder('inputForm')->append(
			$this->view->partial('partials/_form.phtml',
				array('form' => $form)));
    }

	private function checkRequest(){
		var_dump($this->getRequest());
		return $this->getRequest()->getParam('add');
	}
}