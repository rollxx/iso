<?php

/**
* 
*/
class Default_Form_Dimensionality extends Zend_form
{
	
	function init()
	{
		$this->setMethod('post');
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