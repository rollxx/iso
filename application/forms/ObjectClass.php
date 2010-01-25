<?php

/**
* 
*/
class Default_Form_ObjectClass extends Zend_form
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('textarea', 'Definition', array(
		        'label'      => 'Definition:',
		        'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Object Class',
	        ));
	
	}
}


?>