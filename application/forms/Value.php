<?php

/**
* 
*/
class Default_Form_Value extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idValue');
		$value = new Zend_Form_Element_Text('Value');
		$value	->setLabel('Value:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($value);
	}
}


?>