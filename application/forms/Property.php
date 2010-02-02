<?php

/**
* 
*/
class Default_Form_Property extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idP');
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
	            'label'    => 'Add Property',
	        ));
	
	}
}


?>