<?php

/**
* 
*/
class Default_Form_Property extends Zend_form
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('text', 'Definition', array(
		        'label'      => 'Definition:',
		        'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Property',
	        ));
	
	}
}


?>