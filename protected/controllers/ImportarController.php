<?php
class ImportarController extends Controller
{
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'roles'=>array('sysadmin', 'admin'),
			),			
			array('deny'),
		);
	}
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	

	public function actionIndex(){
		$modelo=new ImportarForm;
		if(isset($_POST['datos'])){
			//Activamos el escenario de la segunda pantalla
			$modelo->scenario = 'conArchivo';
        }
		elseif(isset($_POST['estructura'])){
			CopiaDeSeguridad::importarSQL(Yii::app()->basePath . '/data/estructuraTablas.sql');
			Yii::app()->user->setFlash('informacion','Se ha importado correctamente la estructura de la base de datos');
        }
		elseif(isset($_POST['importarDatos'])){
			//Recogemos la instancia del archivo subido
			$modelo->archivo = CUploadedFile::getInstance($modelo,'archivo');
			//Guardamos en variables la ruta del archivo y la extensión
			$ruta=Yii::app()->basePath . '/runtime/'.strtolower($modelo->archivo);
			$archivoPartido=explode(".", strtolower($modelo->archivo));
			$extension = end($archivoPartido); 
			
			//Subimos el archivo al servidor
			$modelo->archivo->saveAs($ruta);
			
			//Importamos el archivo eligiendo si es xml o sql
			if($extension=='xml'){
				if(CopiaDeSeguridad::importarXML($ruta,$modelo->foraneas))
					Yii::app()->user->setFlash('informacion','Los datos del archivo XML han sido importados correctamente');
			}
			elseif($extension=='sql'){
				if(CopiaDeSeguridad::importarSQL($ruta))
					Yii::app()->user->setFlash('informacion','Los datos del archivo SQL han sido importados correctamente');
			}
			else Yii::app()->user->setFlash('error','Error: El archivo importado debe ser xml o sql');

			//Borramos el archivo
			$borrado = unlink($ruta);
			while(!$borrado) unlink($ruta);
        }
		elseif(isset($_POST['ImportarForm'])){
			$modelo->attributes=$_POST['ImportarForm'];
		}
		$this->render('index',array('modelo'=>$modelo));
	}
}
?>