<?php

/**
* 
*/
class Default_Form_IsoForm extends Zend_Form
{
	
	protected function _getDependentSelect($model)
	{
		$data = new $model();
		$result=array();
		foreach ($data->fetchAll()->toArray() as $key => $value) {
			$result[array_shift($value)] = array_shift($value);
		}
		return $result;
	}
}
?>