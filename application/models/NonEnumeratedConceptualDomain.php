<?php

class Default_Model_NonEnumeratedConceptualDomain extends Zend_Db_Table_Abstract implements Default_Model_IsoModel {
	protected $_name = 'nonenumerated_cd';

	public function getVisibleColumns()
	{
		return array('Description');
	}


}

?>