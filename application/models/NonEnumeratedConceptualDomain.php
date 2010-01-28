<?php

class Default_Model_NonEnumeratedConceptualDomain extends Default_Model_ConceptualDomain implements Default_Model_IsoModel {
	protected $_name = 'nonenumerated_cd';
	// protected $_dependentTables = array('Default_Model_ConceptualDomain');

	public function getVisibleColumns()
	{
		return array('Description');
	}

	public function save($value)
	{
		$parentModel = new Default_Model_ConceptualDomain();
		$id=$parentModel->insert(array('Name' =>$value['Name'], 'idDim' => $value['idDim']));
		$this->insert(array('idNECD'=>$id, 'description'=>$value['description']));
	}

}

?>