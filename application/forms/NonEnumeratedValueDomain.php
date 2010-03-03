<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_NonEnumeratedValueDomain extends Default_Form_ValueDomain
{
	public function init()
	{
		parent::init();
		$descr = new Zend_Form_Element_Textarea('Description');
		$descr	->setLabel('Description:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($descr);
		$this->addDisplayGroup(array('Description'), 'group1', array("legend" => "Non Enumerated Value Domain specific values"));
	}
}



?>