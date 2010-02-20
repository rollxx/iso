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
		$retval=$this->insert(array('idECD'=>$id));
		$ecdvm = new Default_Model_EnumeratedConceptualDomainValueMeaning();
		foreach ($value['idVM'] as $key => $v)
			$ecdvm->insert(array('idECD'=>$id, 'idVM'=>$v));
		return $retval;
	}

	public function fetchOneRow($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		$myRow = $this->fetchRow($where);
        $ecdvm = new Default_Model_EnumeratedConceptualDomainValueMeaning();
        $whereVM = $this->getAdapter()->quoteInto('idECD = ?', $id);
        $idvmarray=array();
        foreach($ecdvm->fetchAll($whereVM)->toArray() as $key=>$value){
            $idvmarray []= $value['idVM']; 
        }
		return array_merge($myRow->toArray(), $myRow->findDependentRowset($this->_dependentTables[0])->current()->toArray(), array('idVM' => $idvmarray));
	}

    public function updateOneRow($data){
        $ecdvm = new Default_Model_EnumeratedConceptualDomainValueMeaning();
        $ecdvm->deleteValues($data[$this->_primary]);
        foreach ($data['idVM'] as $key => $v)
            $ecdvm->insert(array('idECD'=>$data[$this->_primary], 'idVM'=>$v));
        unset($data[$this->_primary]);
        unset($data['idVM']);
        $p = new Default_Model_ConceptualDomain();
        $p->updateOneRow($data);
    }
    
}

?>