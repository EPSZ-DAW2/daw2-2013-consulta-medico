<?php

class Facturas extends CActiveRecord{

	public $dninif;
	 
	public function tableName(){
		return 'facturas';
	}

	public function rules(){
		return array(
			array('Serie, Numero, IdPaciente, Importe', 'numerical', 'integerOnly'=>true),
			array('Serie, Numero, Importe','numerical','integerOnly'=>true),
			array('Serie, Numero, Importe', 'length', 'max'=>11),
			array('Concepto', 'length', 'max'=>50),
			array('Notas', 'length', 'max'=>150),
			array('Fecha, FechaCobro', 'safe'),
			array('Serie, Numero, Fecha, Importe, FechaCobro', 'required'),
			array('IdPaciente', 'required', 'message'=>'El DNI introducido es nulo o inválido.'),
			array('IdFactura, Serie, Numero, dninif, Fecha, IdPaciente, Concepto, Importe, FechaCobro, Notas', 'safe', 'on'=>'search'),
		);
	}


	public function relations(){
		return array(
			'paciente' => array(self::BELONGS_TO, 'Pacientes', 'IdPaciente'),
		);
	}

	public function attributeLabels(){
		return array(
			'IdFactura' => 'Factura',
			'Serie' => 'Serie',
			'Numero' => 'Numero',
			'Fecha' => 'Fecha de emisión',
			'IdPaciente' => 'Id Paciente',
			'dninif' => 'DNI/NIF',
			'paciente.DNI_NIF' => 'DNI/NIF',
			'Concepto' => 'Concepto',
			'Importe' => 'Importe',
			'FechaCobro' => 'Fecha de cobro',
			'Notas' => 'Notas',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;
		$criteria->with=array('paciente');
		$criteria->compare('IdFactura',$this->IdFactura);
		$criteria->compare('Serie',$this->Serie);
		$criteria->compare('Numero',$this->Numero);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('paciente.DNI_NIF',$this->dninif);
		$criteria->compare('Concepto',$this->Concepto,true);
		$criteria->compare('Importe',$this->Importe);
		$criteria->compare('FechaCobro',$this->FechaCobro,true);
		$criteria->compare('Notas',$this->Notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
}
