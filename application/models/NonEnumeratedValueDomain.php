<?php

class Default_Model_NonEnumeratedValueDomain extends Default_Model_ValueDomain {
	protected $_name = 'nonenumerated_vd';
	protected $_primary = 'idNEVD';
	protected $_dependentTables = array('Default_Model_ValueDomain');

	public function getVisibleColumns(){
		return array('Description');
	}

	public function getPrintableArray(){
		return parent::getPrintableArray(true);
	}

	public function fetchOneRow($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		$myRow = $this->fetchRow($where);
		return array_merge($myRow->toArray(), $myRow->findDependentRowset($this->_dependentTables[0])->current()->toArray());
	}
	
	public function updateOneRow($data){
		$parentModel = new Default_Model_ValueDomain();
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $data['idVD']);
		$this->update(array('Description' => $data['Description']), $where);
		unset($data['Description']);
		$parentModel->updateOneRow($data);
	}

}

?>