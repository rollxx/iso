<?php

/**
* 
*/
class Default_Form_ConceptualDomain extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'idCD');

		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);

		$dim = new Zend_Form_Element_Select('idDim');
		$dim	->setLabel('Dimensionality:')
				->addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'))
				->setDecorators($this->decorators);
		$this->addElement($dim);
	}

}


?>