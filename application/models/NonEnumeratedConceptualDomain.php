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
        $retval=$this->insert(array('idNECD'=>$id, 'Description'=>$value['Description']));
        return $retval;
    }

    public function fetchOneRow($id){
        $where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
        $myRow = $this->fetchRow($where);
        return array_merge($myRow->toArray(), $myRow->findDependentRowset($this->_dependentTables[0])->current()->toArray());
    }

    public function updateOneRow($data){
        $parentModel = new Default_Model_ConceptualDomain();
        $where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $data['idNECD']);
        $this->update(array('Description' => $data['Description']), $where);
        unset($data['Description']);
        unset($data['idNECD']);
        $parentModel->updateOneRow($data);
    }


}

?>