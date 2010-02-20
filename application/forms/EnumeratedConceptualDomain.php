<?php

/**
* 
*/
class Default_Form_EnumeratedConceptualDomain extends Default_Form_ConceptualDomain
{
	public function init()
	{
		parent::init();
		$this->addElement('hidden', 'idECD');		
		
		$vm = new Zend_Form_Element_Multiselect('idVM');
		$vm -> setLabel('Value Meaning:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueMeaning'))
			->setDecorators($this->decorators);
		$this->addElement($vm);
		 $this->addDisplayGroup(array('idVM'), 'group1', array("legend" => "Enumerated Conceptual Domain specific values"));
	}
}



?>