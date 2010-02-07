<?php

class Default_Model_PermissibleValue extends Default_Model_IsoModel {
	protected $_name = 'permissible_value';
	protected $_primary = 'idPV';
	protected $_dependentTables = array('Default_Model_Value', 'Default_Model_ValueMeaning');
	protected $_referenceMap = array(
		'Default_Model_EnumeratedValueDomainPermissibleValue' => array(
			'columns'=>'idPV',
			'refTableClass'=>'Default_Model_EnumeratedValueDomainPermissibleValue',
			'refColumns'=>'idPV')
			);

	public function getVisibleColumns(){
		return array();
	}
}

?>