<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $IdUsuario
 * @property string $usuario
 * @property string $clave
 * @property string $nombre
 * @property string $FechaHoraUltimaConexion
 * @property integer $numFallos
 *
 * The followings are the available model relations:
 * @property Perfiles[] $perfiles
 */
class Usuarios extends CActiveRecord
{
	//public $password;
	
	public function validatePassword($password){
		return $this->hashPassword($password)===$this->clave;
	}
 
	public function hashPassword($password){
		return md5($password);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numFallos', 'numerical', 'integerOnly'=>true),
			array('usuario, clave, nombre', 'length', 'max'=>50),
			array('FechaHoraUltimaConexion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuario, usuario, clave, nombre, FechaHoraUltimaConexion, numFallos', 'safe', 'on'=>'search'),
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
			'perfiles' => array(self::MANY_MANY, 'Perfiles', 'perfilesusuarios(IdUsuario, IdPerfil)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuario' => 'Id Usuario',
			'usuario' => 'Usuario',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'FechaHoraUltimaConexion' => 'Fecha Hora Ultima Conexion',
			'numFallos' => 'Num Fallos',
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

		$criteria->compare('IdUsuario',$this->IdUsuario);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('FechaHoraUltimaConexion',$this->FechaHoraUltimaConexion,true);
		$criteria->compare('numFallos',$this->numFallos);

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
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
