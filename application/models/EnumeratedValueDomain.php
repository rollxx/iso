<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


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

    public function updateOneRow($data){
        $parentModel = new Default_Model_ValueDomain();
        $parentModel->updateOneRow($data);
        // $parentWhere = $this->getAdapter()->quoteInto('idVD = ?', $data['idVD']);
        // $id=$parentModel->update(array('Name' =>$data['Name'], 'Data_type' => $data['Data_type'], 'Precision' => $data['Precision'], 'idCD' => $data['idCD'], 'idUOM' => $data['idUOM']), $parentWhere);
        // $where = $this->getAdapter()->quoteInto('idEVD = ?', $data['idVD']);
        // $this->update($data[$this->_primary], $where);
    }

    public function save($value){
        $parentModel = new Default_Model_ValueDomain();
        $id=$parentModel->insert(array('Name' =>$value['Name'], 'Data_type' => $value['Data_type'], 'Precision' => $value['Precision'], 'idCD' => $value['idCD'], 'idUOM' => $value['idUOM']));
        $retval=$this->insert(array('idEVD'=>$id));
        return $retval;
    }

    public function getPrintableArray(){
        return parent::getPrintableArray(true);
    }

    public function fetchOneRow($id){
        $where = $this->getAdapter()->quoteInto($this->_primary . ' = ?', $id);
        $myRow = $this->fetchRow($where);
        return array_merge($myRow->toArray(), $myRow->findDependentRowset($this->_dependentTables[0])->current()->toArray());
    }

}

?>