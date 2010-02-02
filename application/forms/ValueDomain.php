<?php

/**
* 
*/
class Default_Form_ValueDomain extends Default_Form_IsoForm
{
	public function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idVD');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$this->addElement('text', 'Data_Type', array(
		        'label'      => 'Data Type:',
		        'required'   => true,
		        'filters'    => array('StringTrim')
				));
		$this->addElement('text', 'Precision', array(
		        'label'      => 'Precision:',
		        'required'   => true,
		        'filters'    => array('StringTrim')
				));
		$cd = new Zend_Form_Element_Select('idCD');
		$cd -> setLabel('Conceptual Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ConceptualDomain'));
		$this->addElement($cd);
		$uom = new Zend_Form_Element_Select('idUOM');
		$uom -> setLabel('Unite of Measure:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_UnitOfMeasure'));
		$this->addElement($uom);
		$this->addElement('submit', 'submit', array(
		        'ignore'   => true,
		        'label'    => 'Add Values',
				'order'    => 10,
		    ));
	}
}



?>