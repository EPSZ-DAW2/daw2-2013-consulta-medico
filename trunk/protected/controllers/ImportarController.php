<?php
class ImportarController extends Controller
{
	public function actionCreate(){
		$model=new ImportarForm;
		if(isset($_POST['ImportarForm'])){
			$model->attributes=$_POST['ImportarForm'];
			$model->archivo = CUploadedFile::getInstance($model,'archivo');
			if ($model->validate()){
				$opcion = $model->opcion;
				if($opcion!=null){
					if(!$opcion)
					{
						DLDatabaseHelper::import('C:\xampp\htdocs\svn\estructura.sql');
						$this->redirect(Yii::app()->baseUrl);
					}else
					{
						$model->scenario = 'withFile';
					}
				}else{
					$model->archivo->saveAs('C:/xampp/htdocs/svn/temporales/'.strtolower($model->archivo));
					//DLDatabaseHelper::import('ruta');
				}
			}
		}
		$this->render('create',array('model'=>$model));
	}
}?>