<?php

class ImportarForm extends CFormModel
{
	public $opcion;
	public $archivo;
	public function rules()
	{
		return array(
			array('archivo','file','types'=>'xml','on' => 'withFile'),
			array('opcion', 'safe'),
		);
	}
}
?>
