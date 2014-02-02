<?php

class ExportarController extends Controller
{
	public function actionIndex(){
		$model=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$model->attributes=$_POST['ExportarForm'];
			if ($model->validate() && $model->validateTables()){
				$tablas = array($model->aseguradoras, $model->facturas, $model->pacientes, $model->perfiles, $model->perfilesusuarios, $model->pruebas, $model->tiposdiagnosticos, $model->usuarios, $model->visitas);
				CopiaDeSeguridad::exportarXML($tablas); 
			}
			else
				Yii::app()->user->setFlash('error',"Debes marcar alguna tabla");
			 
		}
		$this->render('index',array('exportar'=>$model));
	}
}