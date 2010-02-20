<?php

/**
* 
*/
class Default_Form_PermissibleValue extends Default_Form_IsoForm
{
	public function init()
	{
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'idPV');

		$vm = new Zend_Form_Element_Select('idVM');
		$vm -> setLabel('Value Meaning:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueMeaning'))
			->setDecorators($this->decorators);
		$this->addElement($vm);
		
		$v = new Zend_Form_Element_Select('idValue');
		$v -> setLabel('Value:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Value'))
			->setDecorators($this->decorators);
		$this->addElement($v);
		$this->addDisplayGroup(array('idVM', 'idValue'), 'groups', array("legend" => "Permissible Value"));
	}
}
?>