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

		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);

		$dataType = new Zend_Form_Element_Text('Data_type');
		$dataType	->setLabel('Data_Type:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($dataType);

		$precision = new Zend_Form_Element_Text('Precision');
		$precision	->setLabel('Precision:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($precision);

		$cd = new Zend_Form_Element_Select('idCD');
		$cd -> setLabel('Conceptual Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ConceptualDomain'))
			->setDecorators($this->decorators);
		$this->addElement($cd);

		$uom = new Zend_Form_Element_Select('idUOM');
		$uom -> setLabel('Unite of Measure:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_UnitOfMeasure'))
			->setDecorators($this->decorators);
		$this->addElement($uom);
		$this->addDisplayGroup(array('Name', 'Data_type', 'Precision', 'idCD', 'idUOM'), 'groups', array("legend" => "Value Domain"));
	}
}



?>