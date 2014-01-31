<?php

/**
 * This is the model class for table "aseguradoras".
 *
 * The followings are the available columns in table 'aseguradoras':
 * @property integer $idAseguradora
 * @property string $Nombre
 * @property string $Notas
 *
 * The followings are the available model relations:
 * @property Pacientes[] $pacientes
 */
class Aseguradoras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aseguradoras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre', 'length', 'max'=>50),
			array('Notas', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAseguradora, Nombre, Notas', 'safe', 'on'=>'search'),
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
			'pacientes' => array(self::HAS_MANY, 'Pacientes', 'idAseguradora'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAseguradora' => 'Id Aseguradora',
			'Nombre' => 'Nombre Aseguradora',
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

		$criteria->compare('idAseguradora',$this->idAseguradora);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Notas',$this->Notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aseguradoras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
