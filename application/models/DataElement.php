<?php

class Default_Model_DataElement extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'data_element';
	protected $_dependentTables = array('Default_Model_DataElementConcept', 'Default_Model_ValueDomain');
	protected $_referenceMap = array(
		'DataElementConcept' => array(
			'columns'=>array('idDEC'),
			'refTableClass'=>'Default_Model_DataElementConcept',
			'refColumns'=>array('idDEC')),
		'Default_Model_ValueDomain' => array(
			'columns'=>array('idVD'),
			'refTableClass'=>'Default_Model_ValueDomain',
			'refColumns'=>array('idVD'))
		);

	public function getVisibleColumns()
	{
		return array('Name', 'Definition');
	}

}

?>