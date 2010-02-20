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
		
		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);
		
		$definition = new Zend_Form_Element_TextArea('Definition');
		$definition	->setLabel('Definition:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($definition);
		
		$dec = new Zend_Form_Element_Select('idDEC');
		$dec -> setLabel('Data Element Concept:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_DataElementConcept'))
			->setDecorators($this->decorators);
		$this->addElement($dec);
		
		$vm = new Zend_Form_Element_Select('idVD');
		$vm -> setLabel('Value Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueDomain'))
			->setDecorators($this->decorators);
		$this->addElement($vm);
		
		$this->addDisplayGroup(array('Name', 'Definition', 'idDEC', 'idVD'), 'groups', array("legend" => "Data Element"));
	}
}


?>