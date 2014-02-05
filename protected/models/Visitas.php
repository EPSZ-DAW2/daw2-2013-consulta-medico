<?php

/**
 * This is the model class for table "visitas".
 *
 * The followings are the available columns in table 'visitas':
 * @property integer $IdCita
 * @property integer $IdPaciente
 * @property string $Fecha
 * @property string $Notas
 * @property string $Estado
 *
 * The followings are the available model relations:
 * @property Pruebas[] $pruebases
 * @property Pacientes $idPaciente
 */
class Visitas extends CActiveRecord
{

	public $nombre;//para busqueda de paciente
	
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
			array('IdPaciente, Fecha, Hora, Estado', 'required'),
			array('Notas', 'length', 'max'=>150),
			//array('nombre', 'length', 'max'=>150),
			array('Estado', 'length', 'max'=>50),
			array('Fecha, Hora', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
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
			'pruebas' => array(self::HAS_MANY, 'Pruebas', 'IdCita'),
			'pruebas' => array(self::BELONGS_TO, 'Pruebas', 'IdCita'),
			'paciente' => array(self::BELONGS_TO, 'Pacientes', 'IdPaciente'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCita' => 'Id Cita',
			'IdPrueba'=> 'Id Prueba',
			'IdPaciente' => 'Id Paciente',
			'IdTipoDiagnostico'=> 'Id Tipo Diagnostico',
			'dninif' => 'DNI/NIF',
			'Fecha' => 'Fecha',
			'Hora' => 'Hora',
			'Descripcion'=>'Descripcion',
			'Tratamiento'=>'Tratamiento',
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
		$criteria->compare('paciente.Nombre',$this->nombre);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Hora',$this->Hora,true);
		$criteria->compare('Notas',$this->Notas,true);
		$criteria->compare('Estado',$this->Estado,true);
		

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
	 * @return Visitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
