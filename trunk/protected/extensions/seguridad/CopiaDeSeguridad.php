<?php
/**
 *
 * Exportar & Importar 
 *
 * 
 */
class CopiaDeSeguridad
{	
    //FUNCION QUE EXPORTA LOS DATOS DE LA BASE DE DATOS
    public static function exportarXML($tablas)
    {
		$bbDD = Yii::app()->db->pdoInstance;
        $todasTablas = $bbDD->query("show tables");
		$tablaActual=0;
		$salida = "<?xml version=\"1.0\" ?>\n"; 
		$salida .= "<schema>\n"; 

		// iterate over each table and return the fields for each table
		foreach ($todasTablas as $tabla) 
        {
			if($tablas[$tablaActual]){
				$nombreTabla = $tabla[0];
				$resultadoCampos = $bbDD->query( "SELECT * FROM ".$nombreTabla); 
				
				$command = Yii::app()->db->createCommand("SELECT COUNT( * ) FROM information_schema.columns WHERE table_name =  '".$nombreTabla."'");
				$columnas = $command->queryScalar();

				$contador=0;
				while ($itemQuery = $resultadoCampos->fetch(PDO::FETCH_ASSOC)) 
				{
					$itemNames = array_keys($itemQuery);
					$itemNames = array_map("addslashes", $itemNames);
					
					$itemValues = array_values($itemQuery);
					$itemValues = array_map("addslashes", $itemValues);
					
					if($contador==0){
						$salida .= "<tabla nombre=\"".$nombreTabla."\">\n"; 
						$salida.= "<campo>\n";
						foreach(array_combine($itemNames, $itemValues) as $name => $value){
							$salida .= "<atributo nombre=\"".$name."\" valor=\"".$value."\"/>";
						}
						$salida.= "</campo>\n";
						$contador++;
					}
					else{
						$contador2=0;
						$salida.= "<campo>\n";
						foreach(array_combine($itemNames, $itemValues) as $name => $value){
							$salida .= "<atributo nombre=\"".$name."\" valor=\"".$value."\"/>";
						}
						$salida.= "</campo>\n";
					}
				}
				
				if($contador!=0){
					$salida .= "</tabla>\n"; 
				}
			}
			$tablaActual++;
        }  

		$salida .= "</schema>\n"; 
		
        ob_start();
        echo $salida;    
        $contenido = ob_get_contents();
        ob_end_clean();
		
		$nombreFichero = date('YmdHms') . ".xml";
		$peticion = Yii::app()->getRequest();
		$peticion->sendFile($nombreFichero, $contenido);
    }

    public static function importarXML($file,$comprobarCF)
    {
		function comprobarClavesForaneas($tabla, $nombre, $valor){
			switch($tabla){
				case 'facturas':
					if($nombre=='idPaciente'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `pacientes` WHERE `IdPaciente`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}
					return true;
				case 'pacientes':
					if($nombre=='idAseguradora'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `aseguradoras` WHERE `idAseguradora`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}
					return true;
				case 'perfilesusuarios':
					if($nombre=='idPerfil'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `perfiles` WHERE `IdPerfil`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}else{
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `usuarios` WHERE `IdUsuario`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}
					return true;
				case 'pruebas':
					if($nombre=='IdCita'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `visitas` WHERE `IdCita`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}if($nombre=='IdPaciente'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `pacientes` WHERE `IdPaciente`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}if($nombre=='IdTipoDiagnostico'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `tiposdiagnosticos` WHERE `IdTipoDiagnostico`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}
					return true;
				case 'visitas':
					if($nombre=='idPaciente'){
						$comando = Yii::app()->db->createCommand("SELECT COUNT(*) FROM `pacientes` WHERE `IdPaciente`='".$valor."'");
						if($comando->queryScalar()<1) return false;
					}
					return true;
				default:
					return true;
			}
		}
		$bbDD = Yii::app()->db->pdoInstance;
		$bbDD->query("SET FOREIGN_KEY_CHECKS=0;");

		if (file_exists($file)) 
		{
			$xml = simplexml_load_file($file);
			foreach($xml->tabla as $tabla){
				$atributosTabla=$tabla->attributes();
				$bbDD->query("TRUNCATE TABLE `".$atributosTabla->nombre."`;");

				foreach($tabla->campo as $campo){
					$guardarCampo=1;
					$nombres="";
					$valores="";
					foreach($campo->atributo as $atributo){
						$atributosAtributo=$atributo->attributes();
						if($comprobarCF){
							$valido = comprobarClavesForaneas($atributosTabla->nombre, $atributosAtributo->nombre, $atributosAtributo->valor);
							if(!$valido){
								$guardarCampo=0;
								break;
							}
						}
						$nombres.="`".$atributosAtributo->nombre."`,";
						$valores.="'".$atributosAtributo->valor."',";
					}
					if($guardarCampo) $bbDD->query("INSERT INTO `".$atributosTabla->nombre."` (".substr($nombres,0,-1).") VALUES (".substr($valores,0,-1).");");
				}
			}
		} 
    }
	
	public static function importarSQL($archivo){
		$bbDD = Yii::app()->db->pdoInstance;
		try{
			if(file_exists($archivo)){
				$ordenSQL = file_get_contents($archivo);
				$ordenSQL = rtrim($ordenSQL);
				$nuevaOrden = preg_replace_callback("/\((.*)\)/",create_function('$matches','return str_replace(";"," $$$ ", $matches[0]);'),$ordenSQL);
				$arraySQL = explode(";", $nuevaOrden);
				foreach($arraySQL as $valor){
					if(!empty($valor)){
						$sql=str_replace(" $$$ ",";", $valor). ";";
						$bbDD->exec($sql);
					}
				}
				return true;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			exit;
		}
	}
}
