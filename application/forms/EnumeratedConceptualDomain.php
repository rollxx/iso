<?php

/**
* 
*/
class Default_Form_EnumeratedConceptualDomain extends Default_Form_IsoForm
{
	public function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));

		$dim = new Zend_Form_Element_Select('Dimensionality');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'));
		$this->addElement($dim);

		$vm = new Zend_Form_Element_Select('Value Meaning');
		$vm -> setLabel('Value Meaning:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ValueMeaning'));
		$this->addElement($vm);
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Property',
	        ));

	}
}



?>