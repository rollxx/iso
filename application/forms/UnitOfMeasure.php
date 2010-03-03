<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_UnitOfMeasure extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'UOM');

		$descr = new Zend_Form_Element_Textarea('Description');
		$descr	->setLabel('Description:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($descr);

		$dim = new Zend_Form_Element_Select('idDim');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'))
			->setDecorators($this->decorators);
		$this->addElement($dim);
		$this->addDisplayGroup(array('Description', 'idDim'), 'groups', array("legend" => "Unit of Measure"));
	}
}
?>