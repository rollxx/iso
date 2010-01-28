<?php

class Default_Model_NonEnumeratedValueDomain extends Default_Model_ValueDomain implements Default_Model_IsoModel {
	protected $_name = 'nonenumerated_vd';

	public function getVisibleColumns()
	{
		return array('Description');
	}

}

?>