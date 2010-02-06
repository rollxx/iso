<?php

abstract class Default_Model_IsoModel extends Zend_Db_Table_Abstract {
	
	public abstract function getVisibleColumns();
	
	public function deleteValues($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		return $this->delete($where);
	}
	
	public function fetchOneRow($id){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
		return $this->fetchRow($where)->toArray();
	}
	
	public function updateOneRow($data){
		$where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $data[$this->_primary]);
		$this->update($data, $where);
	}
	
	public function getPrintableArray($short=false) {
		$rows = $this->fetchAll();
		$retval = $this->getShortPrintableArray($rows, $short);
		$depTables = $this->getDependentTables();
		$i=0;
		foreach ($rows as $row) {
			foreach ($depTables as $entry) {
				$dep = $row->findDependentRowset($entry)->current();
				$this->getColumnValues($dep, $i, $short, &$retval);
			}
			$i++;
		}
		return $retval;
	}
	
	public function getShortPrintableArray($rows, $short=false){
		$retval = array();
		foreach ($rows->toArray() as $key => $value) {
			$x = array();
			foreach ($value as $key => $value) {
				if (in_array($key, $this->getVisibleColumns($short)) || in_array($key, $this->_primary)) {
					$x[$key]=$value;}}
			$retval[]=$x;
		}
		return $retval;
	}
	
	protected function getColumnValues($row, $i, $short=false, $retval){
		if(!$row) return;
		foreach ($row->toArray() as $key => $value) {
			if (in_array($key, $row->getTable()->getVisibleColumns($short)))
				$retval[$i][substr($row->getTableClass(), strlen('Default_Model_'))/*.'.'.$key*/] = $value;
		}
	}
	
	
}

?>