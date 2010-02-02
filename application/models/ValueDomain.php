<?php

class Default_Model_ValueDomain extends Default_Model_IsoModel {
	protected $_name = 'value_domain';
	protected $_primary = 'idVD';
	protected $_dependentTables = array('Default_Model_DataElement');
	protected $_referenceMap = array(
		'Default_Model_UnitOfMeasure' => array(
			'columns'=>array('idUOM'),
			'refTableClass'=>'Default_Model_UnitOfMeasure',
			'refColumns'=>array('idUOM')),
		'Default_Model_DataElement' => array(
			'columns'=>array('idVD'),
			'refTableClass'=>'Default_Model_DataElement',
			'refColumns'=>array('idVD')),
		'Default_Model_EnumeratedValueDomain' => array(
			'columns'=>array('idVD'),
			'refTableClass'=>'Default_Model_EnumeratedValueDomain',
			'refColumns'=>array('idEVD')),			
		'Default_Model_NonEnumeratedValueDomain' => array(
			'columns'=>array('idVD'),
			'refTableClass'=>'Default_Model_NonEnumeratedValueDomain',
			'refColumns'=>array('idNEVD')),			
			);

	public function getVisibleColumns()
	{
		return array('Name', 'Data_type');
	}
		
}

?>