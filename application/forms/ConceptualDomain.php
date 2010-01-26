<?php

/**
* 
*/
class Default_Form_ConceptualDomain extends Default_Form_IsoForm
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$dim = new Zend_Form_Element_Select('dimensionality');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'));
		$this->addElement($dim);
		$this->addElement('textarea', 'description', array(
		        'label'      => 'Description:',
		        'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Values',
	        ));
		$this->addDisplayGroup(array('name', 'dimensionality', 'description', 'submit'), 'Conceptual Domain', array('legend' => 'Conceptual Domain'));
	}
	
	//TODO implement
	public function save($value)
	{
		
	}
}


?>