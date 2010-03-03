<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Model_ConceptualDomain extends Default_Model_IsoModel{
    protected $_name = 'conceptual_domain';

    protected $_primary = 'idCD';

    protected $_dependentTables = array('Default_Model_Dimensionality');

    protected $_referenceMap = array(
        'Default_Model_Dimensionality' => array(
            'columns'=>array('idDim'),
            'refTableClass'=>'Default_Model_Dimensionality',
            'refColumns'=>array('idDim')),
        'Default_Model_DataElementConcept' => array(
            'columns'=>array('idCD'),
            'refTableClass'=>'Default_Model_DataElementConcept',
            'refColumns'=>array('idCD')),
        'Default_Model_EnumeratedConceptualDomain' => array(
            'columns'=>array('idCD'),
            'refTableClass'=>'Default_Model_EnumeratedConceptualDomain',
            'refColumns'=>array('idECD')),
        'Default_Model_NonEnumeratedConceptualDomain' => array(
            'columns'=>array('idCD'),
            'refTableClass'=>'Default_Model_NonEnumeratedConceptualDomain',
            'refColumns'=>array('idNECD')),
        'Default_Model_ValueDomain' => array(
            'columns'=>array('idCD'),
            'refTableClass'=>'Default_Model_ValueDomain',
            'refColumns'=>array('idCD')),
    );

    public function getVisibleColumns(){
        return array('Name');
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
                $depNextLevel = new $entry();
                $depL1 = $depNextLevel->getDependentTables();
                foreach ($depL1 as $depEntry) {
                    if (in_array($depEntry, $this->_includedModels)) {
                        $depVal = $dep->findDependentRowset($depEntry)->current();
                        $this->getColumnValues($depVal, $i, true, &$retval);
                    }
                }
            }
            $i++;
        }
        return $retval;
    }


}

?>