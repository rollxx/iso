<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_Property extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');

		$this->addElement('hidden', 'idP');

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
		$this->addDisplayGroup(array('Name', 'Definition'), 'groups', array("legend" => "Property"));
	
	}
}


?>