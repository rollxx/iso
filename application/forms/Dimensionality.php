<?php

/**
* 
*/
class Default_Form_Dimensionality extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idDim');
		$this->addElement('text', 'Description', array(
	            'label'      => 'Description:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Dimensionality',
	        ));
	
	}
	
}


?>