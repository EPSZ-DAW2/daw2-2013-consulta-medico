<?php

class PacientesController extends Controller
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
			array('allow',
				'actions'=>array('index', 'view'),
				'roles'=>array('paciente'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('usersAutocomplete'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar', 'paciente'),
			),
			array('allow',
				'actions'=>array('create', 'update', 'delete', 'index', 'view', 'admin'),
				'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar'),
			),
			
			array('deny'),
		);
		/*return array(
			array('allow', 
			 'roles'=>array('sysadmin', 'admin', 'medico', 'auxiliar'),
			 'actions'=>array('assign', 'create','update', 'admin','delete'),
			 array('allow',  // deny all users
				'roles'=>array('@'),
				'actions'=>array('index','view'),
				
			),
			),
		);*/
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
			$criterio= new CDbCriteria;
			$criterio->compare( 'IdPaciente', $model->IdPaciente);
			
			
			$dataProvider1=new CActiveDataProvider('Visitas', array(
				'criteria'=>$criterio,
				'pagination' => array(
					//'pageSize' => 5
					)
				)
			);
			
			$dataProvider2=new CActiveDataProvider('Pruebas', array(
				'criteria'=>$criterio,
				'pagination' => array(
					//'pageSize' => 5
					)
				)
			);
			
		$this->render('view',array(
			'model'=>$this->loadModel($id), 'dataProvider1'=>$dataProvider1, 'dataProvider2'=>$dataProvider2, 
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pacientes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pacientes']))
		{
			$model->attributes=$_POST['Pacientes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdPaciente));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pacientes']))
		{
			$model->attributes=$_POST['Pacientes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdPaciente));
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
		$filtro= new CDbCriteria();
		
		if ($this->esPerfil('paciente')) {
			//El 3 debe salir de algun sitio donde se vincule USUARIOS y PACIENTES.
			$filtro->compare( 'IdPaciente', 3);
		}
		
		$dataProvider=new CActiveDataProvider('Pacientes', array( 
			'criteria'=>$filtro,
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pacientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pacientes']))
			$model->attributes=$_GET['Pacientes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pacientes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pacientes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pacientes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pacientes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
}
