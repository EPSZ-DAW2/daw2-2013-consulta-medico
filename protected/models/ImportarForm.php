<?php

class ImportarForm extends CFormModel
{
	public $opcion;
	public $archivo;
	public $foraneas;
	public function rules()
	{
		return array(
			array('archivo','file','types'=>'xml','on' => 'withFile'),
			array('foraneas', 'boolean','on'=>'withFile'),
			array('opcion', 'safe'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'foraneas'=>'Comprobar claves foráneas',
		);
	}
}
?>
