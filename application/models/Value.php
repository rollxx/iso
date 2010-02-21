<?php

class Default_Model_Value extends Default_Model_IsoModel {
    protected $_name = 'value';

    protected $_primary = 'idValue';

    protected $_referenceMap = array(
        'Default_Model_PermissibleValue' => array(
            'columns'=>'idValue',
            'refTableClass'=>'Default_Model_PermissibleValue',
            'refColumns'=>'idValue')
    );

    public function getVisibleColumns(){
        return array('Value');
    }

}

?>