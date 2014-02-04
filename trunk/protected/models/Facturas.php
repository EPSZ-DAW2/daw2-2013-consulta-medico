<?php

/**
 * This is the model class for table "facturas".
 *
 * The followings are the available columns in table 'facturas':
 * @property integer $IdFactura
 * @property integer $Serie
 * @property integer $Numero
 * @property string $Fecha
 * @property integer $IdPaciente
 * @property string $Concepto
 * @property integer $Importe
 * @property string $FechaCobro
 * @property string $Notas
 *
 * The followings are the available model relations:
 * @property Pacientes $idPaciente
 */
class Facturas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public function tableName()
	{
		return 'facturas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Serie, Numero, IdPaciente, Importe', 'numerical', 'integerOnly'=>true),
			array('Concepto', 'length', 'max'=>50),
			array('Notas', 'length', 'max'=>150),
			array('Fecha, FechaCobro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdFactura, Serie, Numero, Fecha, IdPaciente, Concepto, Importe, FechaCobro, Notas', 'safe', 'on'=>'search'),
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
			'paciente' => array(self::BELONGS_TO, 'Pacientes', 'IdPaciente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdFactura' => 'Id Factura',
			'Serie' => 'Serie',
			'Numero' => 'Numero',
			'Fecha' => 'Fecha',
			'IdPaciente' => 'Id Paciente',
			'Concepto' => 'Concepto',
			'Importe' => 'Importe',
			'FechaCobro' => 'Fecha Cobro',
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

		$criteria->compare('IdFactura',$this->IdFactura);
		$criteria->compare('Serie',$this->Serie);
		$criteria->compare('Numero',$this->Numero);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('IdPaciente',$this->IdPaciente);
		$criteria->compare('Concepto',$this->Concepto,true);
		$criteria->compare('Importe',$this->Importe);
		$criteria->compare('FechaCobro',$this->FechaCobro,true);
		$criteria->compare('Notas',$this->Notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facturas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function autoCompletarFacturas($name='') {
		$sql= 'SELECT IdPaciente ,Nombre AS label FROM pacientes WHERE Nombre LIKE :name';
        $name = $name.'%';
        return Yii::app()->db->createCommand($sql)->queryAll(true,array(':name'=>$name));
    }
}
