<?php
//depricated
class Default_Model_EnumeratedConceptualDomainValueMeaning extends Default_Model_IsoModel {
    protected $_name = 'ecd_vm';

    protected $_primary = array('idECD', 'idVM');

    protected $_dependentTables = array('Default_Model_EnumeratedConceptualDomain', 'Default_Model_EnumeratedValueDomain');

    public function getVisibleColumns(){
        return array();
    }

    public function deleteValues($id){
        $where = $this->getAdapter()->quoteInto('idECD = ?', $id);
        $retval = 0;
        try {
            $retval = $this->delete($where);
        } catch (Exception $e) {
            $retval = 0;
        }
        return $retval;
    }

}

?>