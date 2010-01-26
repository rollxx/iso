<?php

/**
* 
*/
class Default_Form_PermissibleValue extends Default_Form_IsoForm
{
	public function init()
	{
		$this->setMethod('post');
		$vm = new Zend_Form_Element_Select('Value Meaning');
		$vm -> setLabel('Value Meaning:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueMeaning'));
		$this->addElement($vm);
		
		$v = new Zend_Form_Element_Select('Value');
		$v -> setLabel('Value:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Value'));
		$this->addElement($v);

		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Permissible Value',
	        ));
	}
}
?>