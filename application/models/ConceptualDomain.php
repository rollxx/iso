<?php

class Default_Model_ConceptualDomain extends Zend_Db_Table_Abstract {
	protected $_name = 'conceptual_domain';
	protected $_dependentTables = array('Default_Model_DataElementConcept', 'Default_Model_ValueDomain');
	protected $_referenceMap = array(
		'Default_Model_Dimensionality' => array(
			'columns'=>array('idDim'),
			'refTableClass'=>'Default_Model_Dimensionality',
			'refColumns'=>array('idDim')),			
			);

	public function getVisibleColumns()
	{
		return array('Name');
	}
	
}

?>