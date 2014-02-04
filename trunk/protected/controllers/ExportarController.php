<?php
class ExportarController extends Controller
{
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform
				'actions' => array('index'),
				'users' => array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex(){
		$modelo=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$modelo->attributes=$_POST['ExportarForm'];
			//Además de validar el propio modeloo, se deberán validar también las tablas (que al menos haya una marcada)
			if ($modelo->validate() && $modelo->validarTablas()){				
				//Guardamos un array booleano con que tablas deben ser guardadas
				$tablas = array($modelo->aseguradoras, $modelo->authassignment, $modelo->authitem, $modelo->authitemchild, $modelo->facturas, $modelo->pacientes, $modelo->perfiles, $modelo->perfilesusuarios, $modelo->pruebas, $modelo->tiposdiagnosticos, $modelo->usuarios, $modelo->visitas);
				
				//Comprobamos si hay que exportar en SQL o XML
				if($modelo->opcion) CopiaDeSeguridad::exportarSQL($tablas,true);
				else CopiaDeSeguridad::exportarXML($tablas);
			}else Yii::app()->user->setFlash('error','Debes elegir al menos una tabla');
		}
		$this->render('index',array('exportar'=>$modelo));
	}
}
?>