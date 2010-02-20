<?php

/**
* 
*/
class Default_Form_IsoForm extends Zend_Form
{
	protected $decorators = array(
		array('ViewHelper'),
		array('Errors', array('class'=>'error')),
		array('Label', array(
			'requiredSuffix' => ' *',
			'class' => 'leftalign'
	)), 
	array('HtmlTag', array('tag' => 'li')),
	);
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
	
	public function init()
	{
		parent::init();		
		// $this->clearDecorators();
		$submit = new Zend_Form_Element_Submit('submit');
		$submit	->setLabel('Save')
				->setOrder(10)
				->setIgnore(1);
		$this->addElement($submit);
		// $reset = new Zend_Form_Element_Reset('reset');
		// $reset->setOrder(11);
		// $this->addElement($reset);
		// $reset->setLabel('Reset')
		//     ->setDescription('<a href="/">Link</a>')
		// 	->setDecorators(array(
		//         'ViewHelper',
		//         array('Description', array('escape' => false, 'tag' => false)),
		//         array('HtmlTag', array('tag' => 'dd')),
		//         'Errors',
		//       ));
		// $this->addElement($reset);
		// // var_dump($this);
	}
}
?>