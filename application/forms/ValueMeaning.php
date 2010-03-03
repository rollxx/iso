<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_ValueMeaning extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idVM');

		$meaning = new Zend_Form_Element_Text('Meaning');
		$meaning	->setLabel('Meaning:')
				->setRequired(true)
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($meaning);
		$this->addDisplayGroup(array('Meaning'), 'groups', array("legend" => "Value Meaning"));
	}
}


?>