<?php

/**
* 
*/
class Default_Form_ConceptualDomain extends Default_Form_IsoForm
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$dim = new Zend_Form_Element_Select('idDim');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'));
		$this->addElement($dim);
		$this->addElement('submit', 'submit', array(
			            'ignore'   => true,
			            'label'    => 'Add Values',
						'order'		=> 10
			        ));
	// decoration caused issues when saving values
		// $this->addDisplayGroup(array('cdName', 'idDim', 'submit'), 'Conceptual Domain', array('legend' => 'Conceptual Domain'));
	}

}


?>