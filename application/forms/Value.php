<?php

/**
* 
*/
class Default_Form_Value extends Zend_form
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Value', array(
	            'label'      => 'Value:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Value',
	        ));
	
	}
}


?>