<?php


class ExportarForm extends CFormModel
{
	
	
	public $aseguradoras=true;
	public $facturas=true;
	public $pacientes=true;
	public $perfiles=true;
	public $perfilesusuarios=true;
	public $pruebas=true;
	public $tiposdiagnosticos=true;
	public $usuarios=true;
	public $visitas=true;
	public $opcion;
	
	public function rules()
	{
		return array(
			array('aseguradoras, facturas, pacientes, perfiles, perfilesusuarios, pruebas, tiposdiagnosticos, usuarios, visitas', 'boolean'),
			array('opcion', 'safe'),
			
		);	
	}
	public function validateTables()
	{
		if($this->aseguradoras || $this->facturas || $this->pacientes || $this->perfiles || $this->perfilesusuarios || $this->pruebas || $this->tiposdiagnosticos || $this->usuarios || $this->visitas)
		{
			return true;
		}
		else
			return false;
	}
}
