<?php

class Default_Model_NonEnumeratedValueDomain extends Default_Model_ValueDomain {
	protected $_name = 'nonenumerated_vd';
	protected $_primary = 'idNEVD';
	protected $_dependentTables = array('Default_Model_ValueDomain');

	public function getVisibleColumns(){
		return array('Description');
	}

	public function getPrintableArray(){
		return parent::getPrintableArray(true);
	}

}

?>