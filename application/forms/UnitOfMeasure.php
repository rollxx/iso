<?php

/**
* 
*/
class Default_Form_UnitOfMeasure extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'UOM');
		$this->addElement('text', 'description', array(
		        'label'      => 'Description:',
		        'filters'    => array('StringTrim')
				));
		$dim = new Zend_Form_Element_Select('idDim');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'));
		$this->addElement($dim);
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Values',
	        ));
	}
}
?>