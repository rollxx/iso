<?php

/**
* 
*/
class Default_Form_NonEnumeratedConceptualDomain extends Default_Form_ConceptualDomain
{
	public function init()
	{
		parent::init();
		$this->addElement('textarea', 'description', array(
		        'label'      => 'Description:',
		        'filters'    => array('StringTrim')
				));
	}
}

?>