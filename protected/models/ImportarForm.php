<?php
class ImportarForm extends CFormModel
{
	//Examinador de archivo
	public $archivo;
	
	//Botón de check para comprobar las foráneas
	public $foraneas=false;
	
	//Reglas del modelo
	public function rules()
	{
		return array(
			//Los archivos sólo podrán ser xml y sql y aparecer cuando el escenario sea con archivo
			array('archivo','file','types'=>'xml,sql','on' => 'conArchivo'),
			array('foraneas', 'boolean'),
		);
	}
	
	//Etiquetas de los elementos
	public function attributeLabels()
	{
		return array(
			'foraneas'=>'Comprobar claves foráneas (sólo con XML)',
		);
	}
}
?>
