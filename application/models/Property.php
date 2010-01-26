<?php

class Default_Model_Property extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'property';
	protected $_dependentTables = array('Default_Model_DataElementConcept');

	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}
}

?>