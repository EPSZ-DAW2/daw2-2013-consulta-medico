<?php

class VisitasController extends Controller
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
				'actions'=>array('usersAutocomplete'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar', 'paciente'),
			),
			array('allow',
				'actions'=>array('create', 'update', 'delete', 'index', 'view', 'mail', 'admin'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar'),
			),
			
			array('allow',
				'actions'=>array('index', 'view'),
				'roles'=>array('paciente'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','usersAutocomplete'),
				'roles'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'roles'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
			//$model=Pruebas::model()->loadModel($id);
			$model=$this->loadModel($id);
			$criterio= new CDbCriteria;
			$criterio->compare( 'IdCita', $model->IdCita);
			
			
			$dataProvider=new CActiveDataProvider('Pruebas', array(
				'criteria'=>$criterio,
				'pagination' => array(
					//'pageSize' => 5
					)
				)
			);
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),'dataProvider'=>$dataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Visitas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visitas']))
		{
			$model->attributes=$_POST['Visitas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdCita));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 
	 public function actionUsersAutocomplete() {
        $res = array();
		$term = Yii::app()->getRequest()->getParam('term', false);
		if($term){
			$sql = 'SELECT IdPaciente, DNI_NIF, Nombre, Apellidos FROM pacientes'
				. ' WHERE (DNI_NIF LIKE :name) OR (Nombre LIKE :name) OR (Apellidos LIKE :name)'
				. ' LIMIT 25'
				;
			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindValue(":name","%".strtolower($term)."%", PDO::PARAM_STR);
			$res = $cmd->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	 
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visitas']))
		{
			$model->attributes=$_POST['Visitas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdCita));
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

	public function actionAdmin()
	{
		$model=new Visitas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visitas']))
			$model->attributes=$_GET['Visitas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionMail($fecha,$hora,$correo)
	{
		$mail=Yii::app()->Smtpmail;
		$mail->SetFrom("giisidaw@gmail.com","Hospital");
		$mail->Subject="Recordatorio Cita";
		$mail->MsgHTML("<h1>Usted tiene una cita el dia $fecha a las $hora<h1>");
		$mail->AddAddress(,"Alejandro");
		if(!$mail->Send()) 
		{
           echo "Mailer Error: " . $mail->ErrorInfo;
        }
		else 
		{
            echo "El correo ha sido enviado!";
				
		}
		echo CHtml::link('Volver',array('Admin')); 
		
	}
	
	/**
	 * Lists all models.
	 */
	
	public function actionIndex()
	{
		$model=new Calendario;
		if(isset($_POST['Calendario'])){
			$model->attributes=$_POST['Calendario'];
			$criterio= new CDbCriteria;
			$criterio->compare( 'Fecha', $model->fechaVisita);
			
			
			$dataProvider=new CActiveDataProvider('Visitas', array(
				'criteria'=>$criterio,
				'pagination' => array(
					//'pageSize' => 5
					)
				)
			);
			//$fechas=$model->fechaVisita;
			//$comando = Yii::app()->db->createCommand('SELECT COUNT(*) FROM visitas where Fecha=\''.$fechas.'\'');
			//if($comando->queryScalar()<1) Yii::app()->user->setFlash('informacionVisitas','No hay visitas para el día seleccionado');
			$this->render('index',array('dataProvider'=>$dataProvider, 'model'=>$model));
		}else{
			$this->render('index',array('model'=>$model));
		}
	}

	/**
	 * Manages all models.
	 */
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Visitas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Visitas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Visitas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='visitas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
}
