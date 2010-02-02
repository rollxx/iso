<?php

class Default_Model_Dimensionality extends Default_Model_IsoModel{
	protected $_name = 'dimensionality';
	protected $_primary = 'idDim';
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