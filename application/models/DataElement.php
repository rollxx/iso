<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Model_DataElement extends Default_Model_IsoModel {
    protected $_name = 'data_element';

    protected $_primary = 'idDE';

    protected $_dependentTables = array('Default_Model_DataElementConcept', 'Default_Model_ValueDomain');

    protected $_referenceMap = array(
        'DataElementConcept' => array(
            'columns'=>array('idDEC'),
            'refTableClass'=>'Default_Model_DataElementConcept',
            'refColumns'=>array('idDEC')),
        'Default_Model_ValueDomain' => array(
            'columns'=>array('idVD'),
            'refTableClass'=>'Default_Model_ValueDomain',
            'refColumns'=>array('idVD')),
        'Default_Model_NonEnumeratedValueDomain' => array(
            'columns'=>array('idVD'),
            'refTableClass'=>'Default_Model_NonEnumeratedValueDomain',
            'refColumns'=>array('idNEVD')),
        'Default_Model_EnumeratedValueDomain' => array(
            'columns'=>array('idVD'),
            'refTableClass'=>'Default_Model_EnumeratedValueDomain',
            'refColumns'=>array('idEVD'))

    );

    private $_includedModels = array('Default_Model_ObjectClass', 'Default_Model_Property', 'Default_Model_ConceptualDomain');

    public function getVisibleColumns($short=false){
        return $short?array('Name'):array('Name', 'Definition');
    }

    public function getPrintableArray($short=true) {
        $rows = $this->fetchAll();
        $retval = $this->getShortPrintableArray($rows, $short);
        $depTables = $this->getDependentTables();
        $i=0;
        foreach ($rows as $row) {
            foreach ($depTables as $entry) {
                $dep = $row->findDependentRowset($entry)->current();
                $this->getColumnValues($dep, $i, $short, &$retval);
                if ($entry === 'Default_Model_DataElementConcept') {
                    $depNextLevel = new $entry();
                    $depL1 = $depNextLevel->getDependentTables();
                    foreach ($depL1 as $depEntry) {
                        if (in_array($depEntry, $this->_includedModels)) {
                            $depVal = $dep->findDependentRowset($depEntry)->current();
                            $this->getColumnValues($depVal, $i, true, &$retval);
                        }
                    }
                }
            }
            $i++;
        }
        return $retval;
    }
}

?>