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
	public $DNI_NIF; 
	 
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
			array('Serie, Numero','numerical','integerOnly'=>true),
			array('Serie, Numero', 'length', 'max'=>11),
			array('Concepto', 'length', 'max'=>50),
			array('DNI_NIF','validarDNI'),
			array('Notas', 'length', 'max'=>150),
			array('Fecha, FechaCobro', 'safe'),
			array('Serie, Numero, Fecha, IdPaciente, Importe, FechaCobro', 'required'),
			array('IdFactura, Serie, Numero, Fecha, IdPaciente, Concepto, Importe, FechaCobro, Notas', 'safe', 'on'=>'search'),
		);
	}
	
	public function validarDNI($attribute,$params)
	{
		function dnivalido($dni)
		{
			//Comprobamos longitud
			if (strlen($dni) != 9) return false;      
		  
			//Posibles valores para la letra final 
			$valoresLetra = array(
				0 => 'T', 1 => 'R', 2 => 'W', 3 => 'A', 4 => 'G', 5 => 'M',
				6 => 'Y', 7 => 'F', 8 => 'P', 9 => 'D', 10 => 'X', 11 => 'B',
				12 => 'N', 13 => 'J', 14 => 'Z', 15 => 'S', 16 => 'Q', 17 => 'V',
				18 => 'H', 19 => 'L', 20 => 'C', 21 => 'K',22 => 'E'
			);

			//Comprobar si es un DNI
			if (preg_match('/^[0-9]{8}[A-Z]$/i', $dni))
			{
				//Comprobar letra
				if (strtoupper($dni[strlen($dni) - 1]) !=
					$valoresLetra[((int) substr($dni, 0, strlen($dni) - 1)) % 23])
					return false;
		 
				//Todo fue bien 
				return true; 
			}
			//Comprobar si es un NIE
			else if (preg_match('/^[XYZ][0-9]{7}[A-Z]$/i', $dni))
			{
				//Comprobar letra
				if (strtoupper($dni[strlen($dni) - 1]) !=
					$valoresLetra[((int) substr($dni, 1, strlen($dni) - 2)) % 23])
					return false;

				//Todo fue bien
				return true;
			}
			
			//Cadena no válida  
			return false; 
		}
		
		if(dnivalido($attribute)){
			$comando = Yii::app()->db->createCommand('SELECT COUNT(*) FROM pacientes where `DNI_NIF`=\''.$attribute.'\'');
			if($comando->queryScalar()<1) $this->addError('DNI_NIF','El DNI/NIF seleccionado no se corresponde con ningún paciente.');
		}else
			$this->addError('DNI_NIF','El DNI/NIF no es válido.');
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
			'IdFactura' => 'Factura',
			'Serie' => 'Serie',
			'Numero' => 'Numero',
			'Fecha' => 'Fecha de emisión',
			'IdPaciente' => 'DNI/NIF',
			'Concepto' => 'Concepto',
			'Importe' => 'Importe',
			'FechaCobro' => 'Fecha de cobro',
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
}
