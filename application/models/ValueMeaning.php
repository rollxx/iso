<?php

class Default_Model_ValueMeaning extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'value_meaning';
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