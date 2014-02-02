<?php
class ExportarController extends Controller
{
	public function actionIndex(){
		$model=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$model->attributes=$_POST['ExportarForm'];
			//Además de validar el propio modelo, se deberán validar también las tablas (que al menos haya una marcada)
			if ($model->validate() && $model->validateTables()){				
				//Guardamos un array booleano con que tablas deben ser guardadas
				$tablas = array($model->aseguradoras, $model->facturas, $model->pacientes, $model->perfiles, $model->perfilesusuarios, $model->pruebas, $model->tiposdiagnosticos, $model->usuarios, $model->visitas);
				
				//Comprobamos si hay que exportar en SQL o XML
				if($model->opcion) CopiaDeSeguridad::exportarSQL($tablas);
				else CopiaDeSeguridad::exportarXML($tablas);
			} 
		}
		$this->render('index',array('exportar'=>$model));
	}
}
?>