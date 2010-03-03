<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_DataElementConcept extends Default_Form_IsoForm
{
	public function init()
	{	
		parent::init();
		$this->setMethod('post');
		
		$this->addElement('hidden', 'idDEC');
		
		$name = new Zend_Form_Element_Text('Name');
		$name	->setLabel('Name:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($name);

		$definition = new Zend_Form_Element_TextArea('Definition');
		$definition	->setLabel('Definition:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($definition);

		$oc = new Zend_Form_Element_Select('idOC');
		$oc -> setLabel('Object Class:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ObjectClass'))
			->setDecorators($this->decorators);
		$this->addElement($oc);
			
		$p = new Zend_Form_Element_Select('idP');
		$p -> setLabel('Property:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_Property'))
			->setDecorators($this->decorators);
		$this->addElement($p);

		$cd = new Zend_Form_Element_Select('idCD');
		$cd -> setLabel('Conceptual Domain:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_ConceptualDomain'))
			->setDecorators($this->decorators);
		$this->addElement($cd);
		$this->addDisplayGroup(array('Name', 'Definition', 'idOC', 'idP', 'idCD'), 'groups', array("legend" => "Data Element Concept"));
		
	}
}
?>