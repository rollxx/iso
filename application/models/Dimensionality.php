<?php

class Default_Model_Dimensionality extends Zend_Db_Table_Abstract implements Default_Model_IsoModel{
	protected $_name = 'dimensionality';
	protected $_referenceMap = array(
		'Default_Model_ConceptualDomain' => array(
			'columns'=>'idDim',
			'refTableClass'=>'Default_Model_ConceptualDomain',
			'refColumns'=>'idDim'),
		'Default_Model_UnitOfMeasure' => array(
			'columns'=>'idDim',
			'refTableClass'=>'Default_Model_UnitOfMeasure',
			'refColumns'=>'idDim')
			);

	public function getVisibleColumns()
	{
		return array('Description');
	}

}
?>