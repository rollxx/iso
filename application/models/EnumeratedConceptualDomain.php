<?php

class Default_Model_EnumeratedConceptualDomain  extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'enumerated_cd';

	public function getVisibleColumns()
	{
		return array();
	}

}

?>