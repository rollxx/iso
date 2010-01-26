<?php

/**
* 
*/
class Default_Form_ValueMeaning extends Default_Form_IsoForm
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Meaning', array(
	            'label'      => 'Meaning:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Value Meaning',
	        ));
	
	}
}


?>