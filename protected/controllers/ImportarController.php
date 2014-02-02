<?php
class ImportarController extends Controller
{
	public function actionIndex(){
		$model=new ImportarForm;
		if(isset($_POST['ImportarForm'])){
			$model->attributes=$_POST['ImportarForm'];
			
			//Recogemos la instancia del archivo subido
			$model->archivo = CUploadedFile::getInstance($model,'archivo');
			
			$opcion=$model->opcion;
			
			if ($model->validate()){
				//Comprobamos si estamos en la primera o en la segunda pantalla
				if($opcion!=null){
					//Si el usuario elige reestructurar la base de datos
					if($opcion){
						CopiaDeSeguridad::importarSQL('C:/xampp/htdocs/svn/framework/db/schema/estructuraTablas.sql');
						$this->redirect(Yii::app()->baseUrl);
					}else{
						//Activamos el escenario de la segunda pantalla
						$model->scenario = 'withFile';
					}
				}else{
					//Guardamos en variables la ruta del archivo y la extensión
					$ruta='C:/xampp/htdocs/svn/temporales/'.strtolower($model->archivo);
					$extension = end(explode(".", strtolower($model->archivo))); 
					
					//Subimos el archivo al servidor
					$model->archivo->saveAs($ruta);
					
					//Importamos el archivo eligiendo si es xml o sql
					if($extension=='xml') CopiaDeSeguridad::importarXML($ruta,$model->foraneas);
					elseif($extension=='sql') CopiaDeSeguridad::importarSQL($ruta);

					//Borramos el archivo
					$borrado = unlink($ruta);
					while(!$borrado) unlink($ruta);
				}
			}
		}
		$this->render('index',array('model'=>$model));
	}
}
?>