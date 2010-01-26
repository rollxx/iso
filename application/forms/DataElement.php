<?php

/**
* 
*/
class Default_Form_DataElement extends Default_Form_IsoForm
{
	public function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$dec = new Zend_Form_Element_Select('data_element_concept');
		$dec -> setLabel('Data Element Concept:')
			-> addMultiOptions($this->_getDependentSelect('Default_Model_DataElementConcept'));
		$this->addElement($dec);
		
	}

// private function _getDataElementConcept()
// {
// 	$data = new Default_Model_DataElementConcept();
// 	$result=array();
// 	foreach ($data->fetchAll()->toArray() as $key => $value) {
// 		$result[$value['idDim']]=$value['Description'];
// 	}
// 	return $result;
// 	
// }
}


?>