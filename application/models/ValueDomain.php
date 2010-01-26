<?php

class Default_Model_ValueDomain extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'value_domain';
	protected $_dependentTables = array('Default_Model_DataElement');
	protected $_referenceMap = array(
		'Default_Model_UnitOfMeasure' => array(
			'columns'=>array('idUOM'),
			'refTableClass'=>'Default_Model_UnitOfMeasure',
			'refColumns'=>array('idUOM')),
		'Default_Model_ConceptualDomain' => array(
			'columns'=>array('idCD'),
			'refTableClass'=>'Default_Model_ConceptualDomain',
			'refColumns'=>array('idCD')),
		'Default_Model_DataElement' => array(
			'columns'=>array('idVD'),
			'refTableClass'=>'Default_Model_DataElement',
			'refColumns'=>array('idVD')),			
			);

	public function getVisibleColumns()
	{
		return array('Name', 'Data_type');
	}
		
}

?>