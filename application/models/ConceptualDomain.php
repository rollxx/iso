<?php

class Default_Model_ConceptualDomain extends Zend_Db_Table_Abstract implements Default_Model_IsoModel{
	protected $_name = 'conceptual_domain';
	protected $_dependentTables = array('Default_Model_DataElementConcept', 'Default_Model_ValueDomain');
	protected $_referenceMap = array(
		'Default_Model_Dimensionality' => array(
			'columns'=>array('idDim'),
			'refTableClass'=>'Default_Model_Dimensionality',
			'refColumns'=>array('idDim')),			
		'Default_Model_DataElementConcept' => array(
			'columns'=>array('idCD'),
			'refTableClass'=>'Default_Model_DataElementConcept',
			'refColumns'=>array('idCD')),			
			);

	public function getVisibleColumns()
	{
		return array('cdName');
	}
	
}

?>