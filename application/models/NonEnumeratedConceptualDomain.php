<?php

class Default_Model_NonEnumeratedConceptualDomain extends Default_Model_ConceptualDomain {
	protected $_name = 'nonenumerated_cd';
	protected $_primary = 'idNECD';
	protected $_dependentTables = array('Default_Model_ConceptualDomain');
	protected $_includedModels = array('Default_Model_ConceptualDomain', 'Default_Model_Dimensionality');

	public function getVisibleColumns(){
		return array('Description');
	}

	public function save($value){
		$parentModel = new Default_Model_ConceptualDomain();
		$id=$parentModel->insert(array('Name' =>$value['Name'], 'idDim' => $value['idDim']));
		$this->insert(array('idNECD'=>$id, 'description'=>$value['description']));
	}


}

?>