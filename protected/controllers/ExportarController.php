<?php

class ExportarController extends Controller
{
	
		
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionExportar()
	{
		$model=new Exportar;
		//DLDatabaseHelper::export();

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='exportar-Exportar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		if(isset($_POST['Exportar']))
		{
			$model->attributes=$_POST['Exportar'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('exportar',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}