<?php
/**
 * @author Rolland Brunec <rollxx@gmail.com>
 * @copyright Copyright (c) 2010, {@link http://www.imise.uni-leipzig.de/ imise}
 * @version    $Id$
 */


class Default_Model_ObjectClass extends Default_Model_IsoModel {
    protected $_name = 'object_class';

    protected $_primary = 'idOC';

    protected $_referenceMap = array(
        'Default_Model_DataElementConcept' => array(
            'columns'=>'idOC',
            'refTableClass'=>'Default_Model_DataElementConcept',
            'refColumns'=>'idOC')
    );

    public function getVisibleColumns($short = false) {
        return $short?array('Name'):array('Name', 'Definition');
    }
}

?>