<?php

class Default_Model_NonEnumeratedValueDomain extends Default_Model_ValueDomain {
	protected $_name = 'nonenumerated_vd';
	protected $_primary = 'idNEVD';

	public function getVisibleColumns()
	{
		return array('Description');
	}

}

?>