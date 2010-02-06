<?php

/**
* 
*/
class Default_Form_DataElementConcept extends Default_Form_IsoForm
{
	public function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idDEC');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('textarea', 'Definition', array(
		        'label'      => 'Definition:',
		        'filters'    => array('StringTrim')
				));

		$oc = new Zend_Form_Element_Select('idOC');
		$oc -> setLabel('Object Class:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ObjectClass'));
		$this->addElement($oc);
			
		$p = new Zend_Form_Element_Select('idP');
		$p -> setLabel('Property:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Property'));
		$this->addElement($p);

		$cd = new Zend_Form_Element_Select('idCD');
		$cd -> setLabel('Conceptual Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ConceptualDomain'));
		$this->addElement($cd);
		
		$this->addElement('submit', 'submit', array(
		        'ignore'   => true,
		        'label'    => 'Add Data Element Concept',
		    ));
	}
}
?>