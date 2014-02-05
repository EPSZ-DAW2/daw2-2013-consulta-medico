<?php

class FacturasController extends Controller
{
	public $layout='//layouts/column2';

	public function filters(){
		return array('accessControl','postOnly + delete',);
	}

	//Reglas de acceso a las acciones de este controlador
	public function accessRules(){
		return array(
			array('allow',
				'actions'=>array('index', 'view'),
				'roles'=>array('paciente'),
			),
			array('allow',
				'actions'=>array('autoCompletar'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar', 'paciente'),
			),
			array('allow',
				'actions'=>array('create', 'update', 'delete', 'index', 'view','pdf', 'admin'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar'),
			),
			
			array('deny'),
		);
	}

	//El id será el id de la factura a mostrar
	public function actionView($id){
		$this->render('view',array('model'=>$this->loadModel($id),));
	}

	public function actionCreate()
	{
		$model=new Facturas;

		if(isset($_POST['Facturas'])){
			$model->attributes=$_POST['Facturas'];
			if($model->save()) $this->redirect(array('view','id'=>$model->IdFactura));
		}

		$this->render('create',array('model'=>$model,));
	}	
		
	//Acción para controlar el autocompletar de el campo de DNI de crear y actualizar
	public function actionAutoCompletar() {
        $res = array();
		$term = Yii::app()->getRequest()->getParam('term', false);
		if($term){
			$sql = 'SELECT IdPaciente, DNI_NIF, Nombre, Apellidos FROM pacientes'
				. ' WHERE (DNI_NIF LIKE :name) OR (Nombre LIKE :name) OR (Apellidos LIKE :name)'
				. ' LIMIT 25';
			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindValue(":name","%".strtolower($term)."%", PDO::PARAM_STR);
			$res = $cmd->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	//El id será el id de la factura a actualizar
	public function actionUpdate($id){
		$model=$this->loadModel($id);

		if(isset($_POST['Facturas'])){
			$model->attributes=$_POST['Facturas'];
			if($model->save()) $this->redirect(array('view','id'=>$model->IdFactura));
		}

		$this->render('update',array('model'=>$model,));
	}

	//El id será el id de la factura a borrar
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax'])) $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex(){		
		$filtro= new CDbCriteria();
		
		if ($this->esPerfil('paciente')) {
			//El 3 debe salir de algun sitio donde se vincule USUARIOS y PACIENTES.
			$filtro->compare( 'IdPaciente', 3);
		}
		
		$dataProvider=new CActiveDataProvider('Facturas', array( 'criteria'=>$filtro,));
		$this->render('index',array('dataProvider'=>$dataProvider,));
	}

	public function actionAdmin(){
		$model=new Facturas('search');
		$model->unsetAttributes();
		if(isset($_GET['Facturas'])) $model->attributes=$_GET['Facturas'];

		$this->render('admin',array('model'=>$model,));
	}

	public function loadModel($id){
		$model=Facturas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//Acción para el botón de generar pdf
	public function actionPdf($id){
		$factura= Facturas::model()->findByPk( $id);
		if ($factura !== null) {
			$datos=array(
				'factura.idfactura' =>$factura->IdFactura,
				'factura.fecha' =>$factura->Fecha,
				'factura.idpaciente'=>$factura->IdPaciente,
				'factura.numero'=>$factura->Numero,
				'factura.serie'=>$factura->Serie,
				'factura.concepto'=>$factura->Concepto,
				'factura.importe'=>$factura->Importe,
				'factura.fechacobro'=>$factura->FechaCobro,
				'factura.notas'=>$factura->Notas,
				'pacientes.nombre'=>CHtml::value( $factura, 'paciente.Nombre'),
				'pacientes.apellidos'=>CHtml::value( $factura, 'paciente.Apellidos'),
				'pacientes.dni_nif'=>CHtml::value( $factura, 'paciente.DNI_NIF'),
				'pacientes.direccion'=>CHtml::value( $factura, 'paciente.Direccion'),
				'pacientes.codpostal'=>CHtml::value( $factura, 'paciente.CodPostal'),
				'pacientes.localidad'=>CHtml::value( $factura, 'paciente.Localidad'),
				'pacientes.provincia'=>CHtml::value( $factura, 'paciente.Provincia'),
				'pacientes.telfijo'=>CHtml::value( $factura, 'paciente.TelFijo'),
				
				
			);
				
			plantilla::generarPlantilla( 'PlantillaFactura', $datos, true);
		} else {
			echo 'Factura no encontrada.';
		}
    }
}
