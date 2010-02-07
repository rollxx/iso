<?php

class Default_Model_EnumeratedValueDomain extends Default_Model_ValueDomain {
	protected $_name = 'enumerated_vd';
	protected $_primary = 'idEVD';
	protected $_dependentTables = array('Default_Model_ValueDomain');
	protected $_referenceMap = array(
		'Default_Model_EnumeratedValueDomainPermissibleValue' => array(
			'columns'=>'idEVD',
			'refTableClass'=>'Default_Model_EnumeratedValueDomainPermissibleValue',
			'refColumns'=>'idEVD')
			);

	public function getVisibleColumns(){
		return array();
	}
	
	public function save($value){
		$parentModel = new Default_Model_ValueDomain();
		$id=$parentModel->insert(array('Name' =>$value['Name'], 'Data_Type' => $value['Data_Type'], 'Precision' => $value['Precision'], 'idCD' => $value['idCD'], 'idUOM' => $value['idUOM']));
		$this->insert(array('idEVD'=>$id));
	}

	public function getPrintableArray(){
		return parent::getPrintableArray(true);
	}
}

?>