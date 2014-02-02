<?php
//Extensión para importar y exportar la base de datos, tanto en SQL como en XML
class CopiaDeSeguridad{	

	/* --- EXPORTACIÓN --- */

	//Función para exportar en SQL
	public static function exportarSQL($tablas){
		//Instanciamos la base de datos 
        $pdo = Yii::app()->db->pdoInstance;
		
		//Guardo en un array la información de las tablas
        $statments = $pdo->query("show tables");
		
		//Contador para manejar el array parámetro
		$tablaActual=0;
		
		//Aquí iremos almacenando la salida al archivo
		$mysql="";

		//Vamos recorriendo cada tabla
        foreach ($statments as $value){
			//La añadiremos al archivo sólo si el usuario la marcó
			if($tablas[$tablaActual]){
				//Guardamos el nombre de la tabla actual
				$tableName = $value[0];

				//Guardamos toda la información de la tabla actual
				$itemsQuery = $pdo->query("select * from `$tableName`");
				
				$values = "";
				$items = "";
				
				//Recorremos cada una de las filas
				while ($itemQuery = $itemsQuery->fetch(PDO::FETCH_ASSOC)){
					$itemNames = array_keys($itemQuery);
					$itemNames = array_map("addslashes", $itemNames);
					$items = join('`,`', $itemNames);
					$itemValues = array_values($itemQuery);
					$itemValues = array_map("addslashes", $itemValues);
					$valueString = join("','", $itemValues);
					$valueString = "('" . $valueString . "'),";
					$values.="\n" . $valueString;
				} 
				
				//Si la tabla tiene filas
				if ($values != ""){
					//En el caso de que vayamos a introducir valores, eliminamos antes los actuales que tenga la tabla
					$mysql.="TRUNCATE TABLE `$tableName`;\n\r";
					
					//Orden que insertará los valores exportados
					$mysql. = "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";\n\r"; 
				} 
			}
			$tablaActual++;
        } 

		//Preparamos para guardar la variable de salida en el archivo final
        ob_start();
        echo $mysql;    
        $content = ob_get_contents();
        ob_end_clean();
		
		//Guardamos el archivo teniendo como nombre, la fecha y hora actual		
		$saveName = date('YmdHms') . ".sql";
		$request = Yii::app()->getRequest();
		$request->sendFile($saveName, $content);
    }
   
    //Función para exportar en XML
    public static function exportarXML($tablas){
		//Instanciamos la base de datos 
		$bbDD = Yii::app()->db->pdoInstance;
		
		//Guardo en un array la información de las tablas
        $todasTablas = $bbDD->query("show tables");
		
		//Contador para manejar el array parámetro
		$tablaActual=0;
		
		//Aquí iremos almacenando la salida al archivo
		$salida = "<?xml version=\"1.0\" ?>\n<schema>\n"; 

		//Vamos recorriendo cada tabla
		foreach ($todasTablas as $tabla) {
			//La añadiremos al archivo sólo si el usuario la marcó
			if($tablas[$tablaActual]){
				//Guardamos el nombre de la tabla actual
				$nombreTabla = $tabla[0];
				
				//Guardamos toda la información de la tabla actual
				$resultadoCampos = $bbDD->query( "SELECT * FROM ".$nombreTabla); 
				
				//Guardamos el número de atributos que tiene un campo de la tabla
				$command = Yii::app()->db->createCommand("SELECT COUNT( * ) FROM information_schema.columns WHERE table_name =  '".$nombreTabla."'");
				$columnas = $command->queryScalar();

				//Esta variable comprobará si ya hemos introducido la cabecera de la tabla
				$contador=false;
				
				//Recorremos cada una de las filas
				while ($itemQuery = $resultadoCampos->fetch(PDO::FETCH_ASSOC)) {
					$itemNames = array_keys($itemQuery);
					$itemNames = array_map("addslashes", $itemNames);
					
					$itemValues = array_values($itemQuery);
					$itemValues = array_map("addslashes", $itemValues);
					
					//Si no hemos introducio la cabecera
					if(!$contador){
						//Introducimos las cabeceras de la tabla y el campo
						$salida .= "<tabla nombre=\"".$nombreTabla."\">\n<campo>\n"; 

						//Vamos recorriendo los atributos y los añadimos a la salida
						foreach(array_combine($itemNames, $itemValues) as $name => $value)
							$salida .= "<atributo nombre=\"".$name."\" valor=\"".$value."\"/>";
						
						//Introducimos la etiqueta de fin de campo
						$salida.= "</campo>\n";
						$contador=true;
					}
					else{
						//Introducimos la cabecera del campo
						$salida.= "<campo>\n";
						
						//Vamos recorriendo los atributos y los añadimos a la salida
						foreach(array_combine($itemNames, $itemValues) as $name => $value){
							$salida .= "<atributo nombre=\"".$name."\" valor=\"".$value."\"/>";
						}
						
						//Introducimos la etiqueta de fin de campo
						$salida.= "</campo>\n";
					}
				}
				
				//Si hemos introducido algún campo introducimos la etiqueta de fin de tabla
				if($contador){
					$salida .= "</tabla>\n"; 
				}
			}
			$tablaActual++;
        }  

		$salida .= "</schema>\n"; 
		
		//Preparamos para guardar la variable de salida en el archivo final
        ob_start();
        echo $salida;    
        $contenido = ob_get_contents();
        ob_end_clean();
		
		//Guardamos el archivo teniendo como nombre, la fecha y hora actual		
		$nombreFichero = date('YmdHms') . ".xml";
		$peticion = Yii::app()->getRequest();
		$peticion->sendFile($nombreFichero, $contenido);
    }
	
	/* --- EXPORTACIÓN --- */
	
	/* --- IMPORTACIÓN --- */

	//Función para importar en XML
    public static function importarXML($file,$comprobarCF){
		//Función que comprobará si al introducir un registro, las claves foráneas que posea existen en la tabla
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
		
		//Instanciamos la base de datos 
		$bbDD = Yii::app()->db->pdoInstance;
		
		//Desactivamos las claves foráneas para evitar un error de este tipo
		$bbDD->query("SET FOREIGN_KEY_CHECKS=0;");

		if (file_exists($file)) 
		{
			//Cargamos el archivo xml
			$xml = simplexml_load_file($file);
			
			//Vamos recorriendo las tablas
			foreach($xml->tabla as $tabla){
				//Buscamos el nombre de la tabla y eliminamos todos los registros que tenga
				$atributosTabla=$tabla->attributes();
				$bbDD->query("TRUNCATE TABLE `".$atributosTabla->nombre."`;");

				//Recorremos los campos que tenga la tabla
				foreach($tabla->campo as $campo){
					//Variable para comprobar si hay que guardar el campo
					$guardarCampo=true;
					
					$nombres="";
					$valores="";
					
					//Vamos recorriendo los atributos del campo
					foreach($campo->atributo as $atributo){
						$atributosAtributo=$atributo->attributes();
						
						//Si el usuario ha elegido que se comprueben las claves foráneas, las comprobamos
						if($comprobarCF){
							$valido = comprobarClavesForaneas($atributosTabla->nombre, $atributosAtributo->nombre, $atributosAtributo->valor);
							if(!$valido){
								$guardarCampo=false;
								break;
							}
						}
						
						//Si todo está correcto, concatenamos el nombre y el valor del atributo en sus respectivas variables
						$nombres.="`".$atributosAtributo->nombre."`,";
						$valores.="'".$atributosAtributo->valor."',";
					}
					
					//Si es seguro guardar el campo, lo insertamos en la base de datos
					if($guardarCampo) $bbDD->query("INSERT INTO `".$atributosTabla->nombre."` (".substr($nombres,0,-1).") VALUES (".substr($valores,0,-1).");");
				}
			}
		} 
    }
	
	//Función para importar en SQL
	public static function importarSQL($archivo){
		//Instanciamos la base de datos 
		$bbDD = Yii::app()->db->pdoInstance;
		try{
			if(file_exists($archivo)){
				//Desactivamos las claves foráneas para evitar un error de este tipo
				$bbDD->query("SET FOREIGN_KEY_CHECKS=0;");
				
				//Recogemos las órdenes del archivo SQL y las preparamos
				$ordenSQL = file_get_contents($archivo);
				$ordenSQL = rtrim($ordenSQL);
				$nuevaOrden = preg_replace_callback("/\((.*)\)/",create_function('$matches','return str_replace(";"," $$$ ", $matches[0]);'),$ordenSQL);
				$arraySQL = explode(";", $nuevaOrden);
				
				//Recorremos cada una de las órdenes
				foreach($arraySQL as $valor){
					//Vamos procesando cada órden que nos encontremos
					if(!empty($valor)){
						$sql=str_replace(" $$$ ",";", $valor). ";";
						$bbDD->exec($sql);
					}
				}
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			exit;
		}
	}
	
	/* --- IMPORTACIÓN --- */
}
?>