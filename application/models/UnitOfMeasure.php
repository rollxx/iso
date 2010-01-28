<?php

class Default_Model_UnitOfMeasure extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'unit_of_measure';
	// protected $_dependentTables = array('Default_Model_ValueDomain');
	protected $_referenceMap = array(
		'Default_Model_ValueDomain' => array(
			'columns'=>array('idUOM'),
			'refTableClass'=>'Default_Model_ValueDomain',
			'refColumns'=>array('idUOM')),
		);
	public function getVisibleColumns()
	{
		return array('Description');
	}
}

?>