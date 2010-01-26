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
			$col = $data->getVisibleColumns();
			$result[array_shift($value)] = $value[$col[0]];
		}
		return $result;
	}
}
?>