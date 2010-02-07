<?php

/**
* 
*/
class Default_Form_NonEnumeratedConceptualDomain extends Default_Form_ConceptualDomain
{
	public function init()
	{
		parent::init();
		$this->addElement('hidden', 'idNECD');
		$descr = new Zend_Form_Element_Textarea('Description');
		$descr	->setLabel('Description:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators)
				;
		$this->addElement($descr);
	}
}

?>