<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_ValueDomain extends Default_Form_IsoForm
{
	public function init()
	{
		if (get_class($this)==='Default_Form_ValueDomain') {
			$err = new Zend_Form_Element_Text('err');
			$err	->setValue('Please use the subclass...')
					->setAttrib('readonly', true)
					->setDecorators($this->decorators);
			$this->addElement($err);
			return;
		}
		
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