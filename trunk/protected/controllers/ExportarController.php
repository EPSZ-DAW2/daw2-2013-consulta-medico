<?php

class ExportarController extends Controller
{
	public function actionIndex(){
		$model=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$model->attributes=$_POST['ExportarForm'];				
		}
		$this->render('index',array('exportar'=>$model));
	}
}