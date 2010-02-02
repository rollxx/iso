<?php

class Default_Model_Property extends Default_Model_IsoModel {
	protected $_name = 'property';
	protected $_primary = 'idP';
	protected $_dependentTables = array('Default_Model_DataElementConcept');
	protected $_referenceMap = array(
		'Default_Model_DataElementConcept' => array(
			'columns'=>'idP',
			'refTableClass'=>'Default_Model_DataElementConcept',
			'refColumns'=>'idP')
			);

	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}
	
}

?>