<?php

class Default_Model_EnumeratedConceptualDomain extends Default_Model_ConceptualDomain {
	protected $_name = 'enumerated_cd';
	protected $_primary = 'idECD';
	protected $_dependentTables = array('Default_Model_ConceptualDomain');
	protected $_includedModels = array('Default_Model_ConceptualDomain', 'Default_Model_Dimensionality');
	
	public function getVisibleColumns(){
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

	public function fetchOneRow($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		$myRow = $this->fetchRow($where);
		return array_merge($myRow->toArray(), $myRow->findDependentRowset($this->_dependentTables[0])->current()->toArray());
	}


	
}

?>