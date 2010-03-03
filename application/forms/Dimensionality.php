<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Form_Dimensionality extends Default_Form_IsoForm
{
	
	function init()
	{
		parent::init();
		$this->setMethod('post');
		$this->addElement('hidden', 'idDim');
		$descr = new Zend_Form_Element_Textarea('description');
		$descr	->setLabel('Description:')
				->addFilters(array('StringTrim'))
				->setDecorators($this->decorators);
		$this->addElement($descr);
		$this->addDisplayGroup(array('description'), 'groups', array("legend" => "Dimensionality"));
	}
	
}


?>