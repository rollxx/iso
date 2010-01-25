<?php

class Default_Model_DataElementConcept extends Zend_Db_Table_Abstract {
	protected $_name = 'de_concept';
	protected $_dependentTables = array(
		'Default_Model_DataElement',
		);
	protected $_referenceMap = array(
		'Default_Model_ObjectClass' => array(
			'columns'=>array('idOC'),
			'refTableClass'=>'Default_Model_ObjectClass',
			'refColumns'=>array('idOC')),
		'Default_Model_ConceptualDomain' => array(
			'columns'=>array('idCD'),
			'refTableClass'=>'Default_Model_ConceptualDomain',
			'refColumns'=>array('idCD')),
		'Default_Model_Property' => array(
			'columns'=>array('idP'),
			'refTableClass'=>'Default_Model_Property',
			'refColumns'=>array('idP')),			
			);
			
	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}
			
}

?>