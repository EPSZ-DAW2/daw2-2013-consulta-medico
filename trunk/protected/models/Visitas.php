<?php

/**
 * This is the model class for table "visitas".
 *
 * The followings are the available columns in table 'visitas':
 * @property integer $IdCita
 * @property integer $IdPaciente
 * @property string $Fecha_hora
 * @property string $Notas
 * @property string $Estado
 *
 * The followings are the available model relations:
 * @property Pruebas[] $pruebases
 * @property Pacientes $idPaciente
 */
class Visitas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
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
			array('IdPaciente', 'numerical', 'integerOnly'=>true),
			array('Notas', 'length', 'max'=>150),
			array('Estado', 'length', 'max'=>50),
			array('Fecha_hora', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCita, IdPaciente, Fecha_hora, Notas, Estado', 'safe', 'on'=>'search'),
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
			'pruebases' => array(self::HAS_MANY, 'Pruebas', 'IdCita'),
			'idPaciente' => array(self::BELONGS_TO, 'Pacientes', 'IdPaciente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCita' => 'Id Cita',
			'IdPaciente' => 'Id Paciente',
			'Fecha_hora' => 'Fecha Hora',
			'Notas' => 'Notas',
			'Estado' => 'Estado',
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

		$criteria->compare('IdCita',$this->IdCita);
		$criteria->compare('IdPaciente',$this->IdPaciente);
		$criteria->compare('Fecha_hora',$this->Fecha_hora,true);
		$criteria->compare('Notas',$this->Notas,true);
		$criteria->compare('Estado',$this->Estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}