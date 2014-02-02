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
						CopiaDeSeguridad::importarSQL('C:/xampp/htdocs/svn/framework/db/schema/estructuraTablas.sql');
						$this->redirect(Yii::app()->baseUrl);
					}else
					{
						$model->scenario = 'withFile';
					}
				}else{
					$ruta='C:/xampp/htdocs/svn/temporales/'.strtolower($model->archivo);
					$model->archivo->saveAs($ruta);
					CopiaDeSeguridad::importarXML($ruta,$model->foraneas);
					$borrado = unlink($ruta);
					while(!$borrado) unlink($ruta);
				}
			}
		}
		$this->render('create',array('model'=>$model));
	}
}?>