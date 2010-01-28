<?php

/**
* 
*/
class Default_Form_EnumeratedConceptualDomain extends Default_Form_ConceptualDomain
{
	public function init()
	{
		parent::init();
		$vm = new Zend_Form_Element_Multiselect('idVM');
		$vm -> setLabel('Value Meaning:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueMeaning'));
		$this->addElement($vm);
	}
}



?>