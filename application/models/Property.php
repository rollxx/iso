<?php

class Default_Model_Property extends Default_Model_IsoModel {
    protected $_name = 'property';

    protected $_primary = 'idP';

    protected $_referenceMap = array(
        'Default_Model_DataElementConcept' => array(
            'columns'=>'idP',
            'refTableClass'=>'Default_Model_DataElementConcept',
            'refColumns'=>'idP')
    );

    public function getVisibleColumns($short = false){
        return $short?array('Name'):array('Name', 'Definition');
    }

}

?>