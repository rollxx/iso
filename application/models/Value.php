<?php

class Default_Model_Value extends Zend_Db_Table_Abstract {
	protected $_name = 'value';
	protected $_referenceMap = array(
		'Default_Model_PermissibleValue' => array(
			'columns'=>'idValue',
			'refTableClass'=>'Default_Model_PermissibleValue',
			'refColumns'=>'idValue')
			);

		public function getVisibleColumns()
		{
			return array('Value');
		}


}

?>