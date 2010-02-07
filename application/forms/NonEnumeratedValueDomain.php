<?php

/**
* 
*/
class Default_Form_NonEnumeratedValueDomain extends Default_Form_ValueDomain
{
	public function init()
	{
		parent::init();
		$descr = new Zend_Form_Element_Textarea('Description');
		$descr	->setLabel('Description:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($descr);
	}
}



?>