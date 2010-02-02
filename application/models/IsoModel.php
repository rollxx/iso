<?php

abstract class Default_Model_IsoModel extends Zend_Db_Table_Abstract {
	
	public abstract function getVisibleColumns();
	
	public function deleteValues($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		$this->delete($where);
	}
	
	public function fetchOneRow($id)
	{
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		return $this->fetchRow($where)->toArray();
	}
	
	public function updateOneRow($data)
	{
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $data[$this->_primary]);
		$this->update($data, $where);
	}
	
}

?>