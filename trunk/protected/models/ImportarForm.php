<?php

class ImportarForm extends CFormModel
{
	public $opcion;
	public $archivo;
	public $foraneas=false;
	public function rules()
	{
		return array(
			array('archivo','file','types'=>'xml,sql','on' => 'withFile'),
			array('foraneas', 'boolean'),
			array('opcion', 'safe'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'foraneas'=>'Comprobar claves foráneas (sólo con XML)',
		);
	}
}
?>
