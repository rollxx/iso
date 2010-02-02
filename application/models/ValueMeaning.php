<?php

class Default_Model_ValueMeaning extends Default_Model_IsoModel {
	protected $_name = 'value_meaning';
	protected $_primary = 'idVM';
	protected $_referenceMap = array(
		'Default_Model_PermissibleValue' => array(
			'columns'=>'idVM',
			'refTableClass'=>'Default_Model_PermissibleValue',
			'refColumns'=>'idVM')
			);

	public function getVisibleColumns()
	{
		return array('Meaning');
	}

}

?>