<?php
class ImportarController extends Controller
{
	public function actionIndex(){
		$modelo=new ImportarForm;
		if(isset($_POST['ImportarForm'])){
			$modelo->attributes=$_POST['ImportarForm'];
			
			//Recogemos la instancia del archivo subido
			$modelo->archivo = CUploadedFile::getInstance($modelo,'archivo');
			
			$opcion=$modelo->opcion;
			
			if ($modelo->validate()){
				//Comprobamos si estamos en la primera o en la segunda pantalla
				if($opcion!=null){
					//Si el usuario elige reestructurar la base de datos
					if($opcion){
						CopiaDeSeguridad::importarSQL('C:/xampp/htdocs/svn/framework/db/schema/estructuraTablas.sql');
						$this->redirect(Yii::app()->baseUrl);
					}else{
						//Activamos el escenario de la segunda pantalla
						$modelo->scenario = 'conArchivo';
					}
				}else{
					//Guardamos en variables la ruta del archivo y la extensión
					$ruta='C:/xampp/htdocs/svn/temporales/'.strtolower($modelo->archivo);
					$extension = end(explode(".", strtolower($modelo->archivo))); 
					
					//Subimos el archivo al servidor
					$modelo->archivo->saveAs($ruta);
					
					//Importamos el archivo eligiendo si es xml o sql
					if($extension=='xml') CopiaDeSeguridad::importarXML($ruta,$modelo->foraneas);
					elseif($extension=='sql') CopiaDeSeguridad::importarSQL($ruta);

					//Borramos el archivo
					$borrado = unlink($ruta);
					while(!$borrado) unlink($ruta);
				}
			}
		}
		$this->render('index',array('modelo'=>$modelo));
	}
}
?>