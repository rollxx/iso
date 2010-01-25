<?php

class Default_Model_EnumeratedValueDomainPermissibleValue extends Zend_Db_Table_Abstract {
	protected $_name = 'evd_pv';
	protected $_dependentTables = array('Default_Model_EnumeratedValueDomain', 'Default_Model_PermissibleValue');

	public function getVisibleColumns()
	{
		return array();
	}

}
?>