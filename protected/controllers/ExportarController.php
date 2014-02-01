<?php

class ExportarController extends Controller
{
	public function actionIndex(){
		$model=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$model->attributes=$_POST['ExportarForm'];
			if ($model->validate() && $model->validateTables())
				$this->redirect(Yii::app()->baseurl);
			else
				Yii::app()->user->setFlash('error',"Debes marcar alguna tabla");
			 
		}
		$this->render('index',array('exportar'=>$model));
	}
}