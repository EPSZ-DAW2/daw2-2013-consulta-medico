<?php


class ExportarForm extends CFormModel
{
	//Botónes de check de cada una de las tablas
	public $aseguradoras=true;
	public $facturas=true;
	public $pacientes=true;
	public $perfiles=true;
	public $perfilesusuarios=true;
	public $pruebas=true;
	public $tiposdiagnosticos=true;
	public $usuarios=true;
	public $visitas=true;
	
	//Botón de radio para escoger SQL o XML
	public $opcion;
	
	//Reglas del modelo
	public function rules()
	{
		return array(
			array('aseguradoras, facturas, pacientes, perfiles, perfilesusuarios, pruebas, tiposdiagnosticos, usuarios, visitas', 'boolean'),
			array('opcion', 'safe'),
			
		);	
	}
	
	//Función para validar los botones de check. Deberá estar activado al menos uno
	public function validateTables()
	{
		if($this->aseguradoras || $this->facturas || $this->pacientes || $this->perfiles || $this->perfilesusuarios || $this->pruebas || $this->tiposdiagnosticos || $this->usuarios || $this->visitas)
			return true;
		else
			return false;
	}
}
