<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */

class Default_Form_ConceptualDomain extends Default_Form_IsoForm
{
	
	function init()
	{
		if (get_class($this)==='Default_Form_ConceptualDomain') {
			$err = new Zend_Form_Element_Text('err');
			$err	->setValue('Please use the subclass...')
					->setAttrib('readonly', true)
					->setDecorators($this->decorators);
			$this->addElement($err);
			return;
		}
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'idCD');

		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);

		$dim = new Zend_Form_Element_Select('idDim');
		$dim	->setLabel('Dimensionality:')
				->addMultiOptions($this->_getDependentSelect('Default_Model_Dimensionality'))
				->setDecorators($this->decorators);
		$this->addElement($dim);
		 $this->addDisplayGroup(array('Name', 'idDim'), 'groups', array("legend" => "Conceptual Domain"));
	}

}


?>