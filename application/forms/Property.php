<?php

/**
* 
*/
class Default_Form_Property extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'idP');

		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);

		$definition = new Zend_Form_Element_TextArea('Definition');
		$definition	->setLabel('Definition:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($definition);
	
	}
}


?>