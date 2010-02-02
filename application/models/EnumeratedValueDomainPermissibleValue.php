<?php
//depricated
class Default_Model_EnumeratedValueDomainPermissibleValue extends Default_Model_IsoModel {
	protected $_name = 'evd_pv';
	protected $_primary = array('idEVD', 'idPV');
	protected $_dependentTables = array('Default_Model_EnumeratedValueDomain', 'Default_Model_PermissibleValue');

	public function getVisibleColumns()
	{
		return array();
	}

}
?>