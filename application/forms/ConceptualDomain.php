<?php

/**
* 
*/
class Default_Form_ConceptualDomain extends Zend_form
{
	
	function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'Name', array(
	            'label'      => 'Name:',
	            'required'   => true,
	            'filters'    => array('StringTrim')
				));
		$dim = new Zend_Form_Element_Select('dimensionality');
		$dim -> setLabel('Dimensionality:')
			-> addMultiOptions($this->getDimensionality());
		$this->addElement($dim);
		$this->addElement('textarea', 'description', array(
		        'label'      => 'Description:',
		        'filters'    => array('StringTrim')
				));
		$this->addElement('submit', 'submit', array(
	            'ignore'   => true,
	            'label'    => 'Add Values',
	        ));
	}
	
	public function save($value)
	{
		
	}
	
	private function getDimensionality()
	{
		$dim = new Default_Model_Dimensionality();
		$result=array();
		foreach ($dim->fetchAll()->toArray() as $key => $value) {
			$result[$value['idDim']]=$value['Description'];
		}
		return $result;
	}
}


?>