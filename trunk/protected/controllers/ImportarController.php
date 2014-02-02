<?php
class ImportarController extends Controller
{
	public function actionIndex(){
		$modelo=new ImportarForm;
		if(isset($_POST['datos'])){
			//Activamos el escenario de la segunda pantalla
			$modelo->scenario = 'conArchivo';
        }
		elseif(isset($_POST['estructura'])){
			$md5 = md5_file('C:/xampp/htdocs/svn/framework/db/schema/estructuraTablas.sql');
			echo $md5;
			if(strcmp($md5,"7ffb69bbfbe43daf86a71c6cdc4e1fcb")==0){
				CopiaDeSeguridad::importarSQL('C:/xampp/htdocs/svn/framework/db/schema/estructuraTablas.sql');
				Yii::app()->user->setFlash('informacion','Se ha importado correctamente la estructura de la base de datos');
			}
			else Yii::app()->user->setFlash('error','El archivo con la estructura de la base de datos está corrupto, contacte con el administrador');
        }
		elseif(isset($_POST['importarDatos'])){
			//Recogemos la instancia del archivo subido
			$modelo->archivo = CUploadedFile::getInstance($modelo,'archivo');
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
			
			Yii::app()->user->setFlash('informacion','Los datos han sido importados correctamente');
        }
		elseif(isset($_POST['ImportarForm'])){
			$modelo->attributes=$_POST['ImportarForm'];
		}
		$this->render('index',array('modelo'=>$modelo));
	}
}
?>