<?php

class Default_Model_EnumeratedValueDomain extends Default_Model_ValueDomain implements Default_Model_IsoModel {
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
	
	public function save($value)
	{
		$parentModel = new Default_Model_ValueDomain();
		$id=$parentModel->insert(array('Name' =>$value['Name'], 'idDim' => $value['idDim']));
		$this->insert(array('idECD'=>$id));
		$ecdvm = new Default_Model_EnumeratedConceptualDomainValueMeaning();
		foreach ($value['idVM'] as $key => $v)
			$ecdvm->insert(array('idECD'=>$id, 'idVM'=>$v));			
	}

}

?>