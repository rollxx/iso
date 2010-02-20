<?php

/**
* 
*/
class Default_Form_ObjectClass extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		
		$this->addElement('hidden', 'idOC');
		
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
		$this->addDisplayGroup(array('Name', 'Definition'), 'groups', array("legend" => "Object Class"));
	}
}


?>