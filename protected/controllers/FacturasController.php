<?php

class FacturasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','plantilla', 'Pdf'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','medico'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array('model'=>$this->loadModel($id),));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Facturas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facturas']))
		{
			$model->attributes=$_POST['Facturas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdFactura));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}	
		
	public function actionAutoCompletar() {
        $term = trim($_GET['term']) ;
 
        if($term !='') {
			$users =  Facturas::autoCompletarFacturas($term);
            echo CJSON::encode($users);
            Yii::app()->end();
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facturas']))
		{
			$model->attributes=$_POST['Facturas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdFactura));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Facturas');
		/*
		$mPDF1 = Yii::app()->ePdf->mpdf();
		
		$mPDF1->WriteHTML("Hola Mundo");
		
		$mPDF1->Output();
		*/
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Facturas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Facturas']))
			$model->attributes=$_GET['Facturas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Facturas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Facturas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Facturas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}/*PARA EL PDF*/
	public function actionPdf($id)
    {
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
				//$serie,$numero,$fecha,$concepto,$importe,$fechac,$notas,$Plantillas);
			//plantilla::generarplantilla($plantilla, array($model->IdFacturas,$model->Series,$model->Numero,$model->Fecha,$model->IdPaciente,$model->IdFacturas,$model->Concepto,$model->Importe,$model->FechaCobro,$model->Notas));
			//plantilla::generarPlantilla( 'PlantillaFactura', $datos, false);
			plantilla::generarPlantilla( 'PlantillaFactura', $datos, true);
		} else {
			echo 'Factura no encontrada.';
		}
	/*
	$html="La factura con ID: " . $idfactura."\n\r Numero de Serie: ". $serie . "\n Numero de Factura: ". $numero . "\n Del paciente con ID: ". $idpaciente . "\n Concepto: " . $concepto . "\n Importe de Factura: " . $importe . "\n Notas de Factura: " . $notas;
	
	
	$mPDF1 = Yii::app()->ePdf->mpdf();
		
	$mPDF1->WriteHTML($html);
		
	$mPDF1->Output();*/
	
        //$this->render('pdf',array('model'=>$this->loadModel($id),));
    }
}
