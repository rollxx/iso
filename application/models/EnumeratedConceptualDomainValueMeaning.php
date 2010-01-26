<?php

class Default_Model_EnumeratedConceptualDomainValueMeaning extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'ecd_vm';
	protected $_dependentTables = array('Default_Model_EnumeratedConceptualDomain', 'Default_Model_EnumeratedValueDomain');

	public function getVisibleColumns()
	{
		return array();
	}

}

?>