<?php

class Default_Model_ObjectClass extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'object_class';
	protected $_dependentTables = array('Default_Model_DataElementConcept');
	
	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}	
}
?>