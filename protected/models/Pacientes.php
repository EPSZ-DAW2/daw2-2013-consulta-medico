<?php

/**
 * This is the model class for table "pacientes".
 *
 * The followings are the available columns in table 'pacientes':
 * @property integer $IdPaciente
 * @property string $Apellidos
 * @property string $Nombre
 * @property string $DNI_NIF
 * @property string $Fecha_nacimiento
 * @property string $Direccion
 * @property integer $CodPostal
 * @property string $Localidad
 * @property string $Provincia
 * @property integer $TelFijo
 * @property integer $TelMovil
 * @property string $Email
 * @property integer $idAseguradora
 * @property string $Notas
 *
 * The followings are the available model relations:
 * @property Facturas[] $facturases
 * @property Aseguradoras $idAseguradora0
 * @property Pruebas[] $pruebases
 * @property Visitas[] $visitases
 */
class Pacientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pacientes';
		return 'visitas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodPostal, TelFijo, TelMovil, idAseguradora', 'numerical', 'integerOnly'=>true),
			array('Apellidos, Nombre, Direccion, Localidad, Provincia, Email', 'length', 'max'=>50),
			array('DNI_NIF', 'length', 'max'=>9),
			array('Notas', 'length', 'max'=>150),
			array('Fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPaciente, Apellidos, Nombre, DNI_NIF, Fecha_nacimiento, Direccion, CodPostal, Localidad, Provincia, TelFijo, TelMovil, Email, idAseguradora, Notas', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'facturases' => array(self::HAS_MANY, 'Facturas', 'IdPaciente'),
			'idAseguradora0' => array(self::BELONGS_TO, 'Aseguradoras', 'idAseguradora'),
			'pruebases' => array(self::HAS_MANY, 'Pruebas', 'IdPaciente'),
			'visitases' => array(self::HAS_MANY, 'Visitas', 'IdPaciente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPaciente' => 'Id Paciente',
			'Apellidos' => 'Apellidos',
			'Nombre' => 'Nombre',
			'DNI_NIF' => 'Dni Nif',
			'Fecha_nacimiento' => 'Fecha Nacimiento',
			'Direccion' => 'Direccion',
			'CodPostal' => 'Cod Postal',
			'Localidad' => 'Localidad',
			'Provincia' => 'Provincia',
			'TelFijo' => 'Tel Fijo',
			'TelMovil' => 'Tel Movil',
			'Email' => 'Email',
			'idAseguradora' => 'Id Aseguradora',
			'Notas' => 'Notas',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdPaciente',$this->IdPaciente);
		$criteria->compare('Apellidos',$this->Apellidos,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('DNI_NIF',$this->DNI_NIF,true);
		$criteria->compare('Fecha_nacimiento',$this->Fecha_nacimiento,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CodPostal',$this->CodPostal);
		$criteria->compare('Localidad',$this->Localidad,true);
		$criteria->compare('Provincia',$this->Provincia,true);
		$criteria->compare('TelFijo',$this->TelFijo);
		$criteria->compare('TelMovil',$this->TelMovil);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('idAseguradora',$this->idAseguradora);
		$criteria->compare('Notas',$this->Notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pacientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
