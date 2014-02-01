<?php


class ImportarForm extends CFormModel
{
	public $ruta;
	
	public function rules()
	{
		return array(
			array('ruta', 'safe'),
		);
	}
	
}
?>