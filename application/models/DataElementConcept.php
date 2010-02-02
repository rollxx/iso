<?php

class Default_Model_DataElementConcept extends Default_Model_IsoModel{
	protected $_name = 'de_concept';
	protected $_primary = 'idDEC';
	protected $_dependentTables = array(
		'Default_Model_DataElement', 'Default_Model_ObjectClass', 'Default_Model_Property', 'Default_Model_ConceptualDomain'
		);
	protected $_referenceMap = array(
		'Default_Model_ObjectClass' => array(
			'columns'=>array('idOC'),
			'refTableClass'=>'Default_Model_ObjectClass',
			'refColumns'=>array('idOC')),
		'Default_Model_Property' => array(
			'columns'=>array('idP'),
			'refTableClass'=>'Default_Model_Property',
			'refColumns'=>array('idP')),
		'Default_Model_DataElement' => array(
			'columns'=>array('idDEC'),
			'refTableClass'=>'Default_Model_DataElement',
			'refColumns'=>array('idDEC')),			
		'Default_Model_NonEnumeratedConceptualDomain' => array(
			'columns'=>array('idCD'),
			'refTableClass'=>'Default_Model_NonEnumeratedConceptualDomain',
			'refColumns'=>array('idNECD')),			
			);
			
	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}
			
}

?>