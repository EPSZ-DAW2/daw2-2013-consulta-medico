<?php

/**
 * This is the model class for table "pruebas".
 *
 * The followings are the available columns in table 'pruebas':
 * @property integer $IdPrueba
 * @property integer $IdCita
 * @property integer $IdPaciente
 * @property integer $IdTipoDiagnostico
 * @property string $Fecha_Hora
 * @property string $Descripcion
 * @property string $Tratamiento
 * @property string $Notas
 *
 * The followings are the available model relations:
 * @property Visitas $idCita
 * @property Pacientes $idPaciente
 * @property Tiposdiagnosticos $idTipoDiagnostico
 */
class Pruebas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pruebas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdCita, IdPaciente, IdTipoDiagnostico', 'numerical', 'integerOnly'=>true),
			array('Descripcion, Tratamiento', 'length', 'max'=>50),
			array('Notas', 'length', 'max'=>150),
			array('Fecha_Hora', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPrueba, IdCita, IdPaciente, IdTipoDiagnostico, Fecha_Hora, Descripcion, Tratamiento, Notas', 'safe', 'on'=>'search'),
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
			'idCita' => array(self::BELONGS_TO, 'Visitas', 'IdCita'),
			'idPaciente' => array(self::BELONGS_TO, 'Pacientes', 'IdPaciente'),
			'idTipoDiagnostico' => array(self::BELONGS_TO, 'Tiposdiagnosticos', 'IdTipoDiagnostico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPrueba' => 'Id Prueba',
			'IdCita' => 'Id Cita',
			'IdPaciente' => 'Id Paciente',
			'IdTipoDiagnostico' => 'Id Tipo Diagnostico',
			'Fecha_Hora' => 'Fecha Hora',
			'Descripcion' => 'Descripcion',
			'Tratamiento' => 'Tratamiento',
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

		$criteria->compare('IdPrueba',$this->IdPrueba);
		$criteria->compare('IdCita',$this->IdCita);
		$criteria->compare('IdPaciente',$this->IdPaciente);
		$criteria->compare('IdTipoDiagnostico',$this->IdTipoDiagnostico);
		$criteria->compare('Fecha_Hora',$this->Fecha_Hora,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Tratamiento',$this->Tratamiento,true);
		$criteria->compare('Notas',$this->Notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array (
				'pageSize' => 5 
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pruebas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
