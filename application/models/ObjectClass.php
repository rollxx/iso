<?php

class Default_Model_ObjectClass extends Default_Model_IsoModel {
	protected $_name = 'object_class';
	protected $_primary = 'idOC';
	protected $_dependentTables = array('Default_Model_DataElementConcept');
	protected $_referenceMap = array(
		'Default_Model_DataElementConcept' => array(
			'columns'=>'idOC',
			'refTableClass'=>'Default_Model_DataElementConcept',
			'refColumns'=>'idOC')
			);

	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}	
}
?>