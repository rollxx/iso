<?php

class Default_Model_NonEnumeratedValueDomain extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'nonenumerated_vd';

	public function getVisibleColumns()
	{
		return array('Description');
	}

}

?>