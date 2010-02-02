<?php

/**
* 
*/
class Default_Form_NonEnumeratedConceptualDomain extends Default_Form_ConceptualDomain
{
	public function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idNECD');
		$this->addElement('textarea', 'description', array(
		        'label'      => 'Description:',
		        'filters'    => array('StringTrim')
				));
	}
}

?>