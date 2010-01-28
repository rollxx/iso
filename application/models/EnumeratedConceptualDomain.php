<?php

class Default_Model_EnumeratedConceptualDomain extends Default_Model_ConceptualDomain implements Default_Model_IsoModel {
	protected $_name = 'enumerated_cd';
	protected $_dependentTables = array('Default_Model_ConceptualDomain');

	public function getVisibleColumns()
	{
		return array();
	}
	
	public function save($value)
	{
		$parentModel = new Default_Model_ConceptualDomain();
		$id=$parentModel->insert(array('Name' =>$value['Name'], 'idDim' => $value['idDim']));
		$this->insert(array('idECD'=>$id));
		$ecdvm = new Default_Model_EnumeratedConceptualDomainValueMeaning();
		foreach ($value['idVM'] as $key => $v)
			$ecdvm->insert(array('idECD'=>$id, 'idVM'=>$v));			
	}

}

?>