<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


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