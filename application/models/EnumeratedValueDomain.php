<?php

class Default_Model_EnumeratedValueDomain extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'enumerated_vd';
	protected $_referenceMap = array(
		'Default_Model_EnumeratedValueDomainPermissibleValue' => array(
			'columns'=>'idEVD',
			'refTableClass'=>'Default_Model_EnumeratedValueDomainPermissibleValue',
			'refColumns'=>'idEVD')
			);

		public function getVisibleColumns()
		{
			return array();
		}


}

?>