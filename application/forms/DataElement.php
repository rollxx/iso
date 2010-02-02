<?php

/**
* 
*/
class Default_Form_DataElement extends Default_Form_IsoForm
{
	public function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idDE');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('textarea', 'Definition', array(
		        'label'      => 'Definition:',
		        'filters'    => array('StringTrim')
				));
		$dec = new Zend_Form_Element_Select('idDEC');
		$dec -> setLabel('Data Element Concept:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_DataElementConcept'));
		$this->addElement($dec);
		$vm = new Zend_Form_Element_Select('idVD');
		$vm -> setLabel('Value Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueDomain'));
		$this->addElement($vm);
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Values',
	        ));
	}
}


?>