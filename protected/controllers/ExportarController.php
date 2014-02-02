<?php
class ExportarController extends Controller
{
	public function actionIndex(){
		$modelo=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$modelo->attributes=$_POST['ExportarForm'];
			//Además de validar el propio modeloo, se deberán validar también las tablas (que al menos haya una marcada)
			if ($modelo->validate() && $modelo->validarTablas()){				
				//Guardamos un array booleano con que tablas deben ser guardadas
				$tablas = array($modelo->aseguradoras, $modelo->facturas, $modelo->pacientes, $modelo->perfiles, $modelo->perfilesusuarios, $modelo->pruebas, $modelo->tiposdiagnosticos, $modelo->usuarios, $modelo->visitas);
				
				//Comprobamos si hay que exportar en SQL o XML
				if($modelo->opcion) CopiaDeSeguridad::exportarSQL($tablas);
				else CopiaDeSeguridad::exportarXML($tablas);
			} 
		}
		$this->render('index',array('exportar'=>$modelo));
	}
}
?>