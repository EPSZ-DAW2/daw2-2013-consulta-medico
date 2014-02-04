<?php
//Extensión para importar y exportar la base de datos, tanto en SQL como en XML
class CopiaDeSeguridad{	

	/* --- EXPORTACIÓN --- */

	//Función para exportar en SQL
	public static function exportarSQL($tablas,$externa){
		try{
			//Instanciamos la base de datos 
			$bbDD = Yii::app()->db->pdoInstance;
			
			//Guardo en un array la información de las tablas
			$todasTablas = $bbDD->query("show tables");
			
			//Contador para manejar el array parámetro
			$tablaActual=0;
			
			//Aquí iremos almacenando la salida al archivo
			$salida="";

			//Vamos recorriendo cada tabla
			foreach ($todasTablas as $tabla){
				//La añadiremos al archivo sólo si el usuario la marcó
				if($tablas[$tablaActual]){
					//Guardamos el nombre de la tabla actual
					$nombreTabla = $tabla[0];

					//Guardamos toda la información de la tabla actual
					$resultadosCampos = $bbDD->query("select * from `$nombreTabla`");
					
					$valores = "";
					$nombres = "";
					
					//Recorremos cada una de las filas
					while ($resultadoCampos = $resultadosCampos->fetch(PDO::FETCH_ASSOC)){
						$nombresCampos = array_keys($resultadoCampos);
						$nombresCampos = array_map("addslashes", $nombresCampos);
						$nombres = join('`,`', $nombresCampos);
						$valoresCampos = array_values($resultadoCampos);
						$valoresCampos = array_map("addslashes", $valoresCampos);
						$valoresString = join("','", $valoresCampos);
						$valoresString = "('" . $valoresString . "'),";
						$valores.="\n" . $valoresString;
					} 
					
					//Si la tabla tiene filas
					if ($valores != ""){
						//En el caso de que vayamos a introducir valores, eliminamos antes los actuales que tenga la tabla
						$salida.="TRUNCATE TABLE `$nombreTabla`;\n\r";
						
						//Orden que insertará los valores exportados
						$salida.= "INSERT INTO `$nombreTabla` (`$nombres`) VALUES" . rtrim($valores, ",") . ";\n\r"; 
					} 
				}
				$tablaActual++;
			} 

			//Preparamos para guardar la variable de salida en el archivo final
			ob_start();
			echo $salida;    
			$contenido = ob_get_contents();
			ob_end_clean();
			
			//Guardamos el archivo teniendo como nombre, la fecha y hora actual		
			if($externa) Yii::app()->request->sendFile('consultamedico'.date('YmdHms') . ".sql", $contenido);
			else{
				$fp = fopen(Yii::app()->basePath . '/runtime/temporal.sql', 'w');
				fwrite($fp, $contenido);
				fclose($fp);
			}
			
			return true;
		}catch(PDOException $excepcion){
			Yii::app()->user->setFlash('error',"Error: ".$excepcion->getMessage());
			return false;
		}
    }
   
    //Función para exportar en XML
    public static function exportarXML($tablas){
		try{
			//Instanciamos la base de datos 
			$bbDD = Yii::app()->db->pdoInstance;
			
			//Guardo en un array la información de las tablas
			$todasTablas = $bbDD->query("show tables");
			
			//Contador para manejar el array parámetro
			$tablaActual=0;
			
			//Aquí iremos almacenando la salida al archivo
			$salida = "<?xml version=\"1.0\" ?>\n<esquema>\n"; 

			//Vamos recorriendo cada tabla
			foreach ($todasTablas as $tabla) {
				//La añadiremos al archivo sólo si el usuario la marcó
				if($tablas[$tablaActual]){
					//Guardamos el nombre de la tabla actual
					$nombreTabla = $tabla[0];
					
					//Guardamos toda la información de la tabla actual
					$resultadosCampos = $bbDD->query( "SELECT * FROM ".$nombreTabla); 

					//Esta variable comprobará si ya hemos introducido la cabecera de la tabla
					$cabeceraTabla=false;
					
					//Recorremos cada una de las filas
					while ($resultadoCampos = $resultadosCampos->fetch(PDO::FETCH_ASSOC)) {
						$nombresCampos = array_keys($resultadoCampos);
						$nombresCampos = array_map("addslashes", $nombresCampos);
						
						$valoresCampos = array_values($resultadoCampos);
						$valoresCampos = array_map("addslashes", $valoresCampos);
						
						//Si no hemos introducio la cabecera
						if(!$cabeceraTabla){
							//Introducimos las cabeceras de la tabla y el campo
							$salida .= "<tabla nombre=\"".$nombreTabla."\">\n<campo>\n"; 

							//Vamos recorriendo los atributos y los añadimos a la salida
							foreach(array_combine($nombresCampos, $valoresCampos) as $nombre => $valor)
								$salida .= "<atributo nombre=\"".$nombre."\" valor=\"".$valor."\"/>";
							
							//Introducimos la etiqueta de fin de campo
							$salida.= "</campo>\n";
							$cabeceraTabla=true;
						}
						else{
							//Introducimos la cabecera del campo
							$salida.= "<campo>\n";
							
							//Vamos recorriendo los atributos y los añadimos a la salida
							foreach(array_combine($nombresCampos, $valoresCampos) as $nombre => $valor){
								$salida .= "<atributo nombre=\"".$nombre."\" valor=\"".$valor."\"/>";
							}
							
							//Introducimos la etiqueta de fin de campo
							$salida.= "</campo>\n";
						}
					}
					
					//Si hemos introducido algún campo introducimos la etiqueta de fin de tabla
					if($cabeceraTabla){
						$salida .= "</tabla>\n"; 
					}
				}
				$tablaActual++;
			}  

			$salida .= "</esquema>\n"; 
			
			//Preparamos para guardar la variable de salida en el archivo final
			ob_start();
			echo $salida;    
			$contenido = ob_get_contents();
			ob_end_clean();
			
			//Guardamos el archivo teniendo como nombre, la fecha y hora actual		
			Yii::app()->request->sendFile('consultamedico'.date('YmdHms') . ".xml", $contenido);
			
			return true;			
		}catch(PDOException $excepcion){
			Yii::app()->user->setFlash('error',"Error: ".$excepcion->getMessage());
			return false;
		}
    }
	
	/* --- EXPORTACIÓN --- */
	
	/* --- IMPORTACIÓN --- */

	//Función para importar en XML
    public static function importarXML($archivo,$comprobarCF){
		try{
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

			if (file_exists($archivo)){
				//Exportamos el estado actual de la base de datos
				CopiaDeSeguridad::exportarSQL(array(true,true,true,true,true,true,true,true,true,true,true,true),false);
				
				//Cargamos el archivo xml
				$xml = simplexml_load_file($archivo);
				
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
				//Borramos el archivo
				$borrado = unlink(Yii::app()->basePath . '/runtime/temporal.sql');
				
				return true;
			}else{
				Yii::app()->user->setFlash('error',"Error: El archivo no existe");
				return false;
			}
		}catch(PDOException $excepcion){
			Yii::app()->user->setFlash('error',"Error: ".$excepcion->getMessage());
			
			//Restablecemos la base de datos a su estado anterior
			CopiaDeSeguridad::importarSQL(Yii::app()->basePath . '/runtime/temporal.sql');
			
			//Borramos el archivo
			$borrado = unlink(Yii::app()->basePath . '/runtime/temporal.sql');
			
			return false;
		}
    }
	
	//Función para importar en SQL
	public static function importarSQL($archivo){
		try{
			//Instanciamos la base de datos 
			$bbDD = Yii::app()->db->pdoInstance;
			
			if(file_exists($archivo)){
				//Exportamos el estado actual de la base de datos
				CopiaDeSeguridad::exportarSQL(array(true,true,true,true,true,true,true,true,true,true,true,true),false);
				
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
				
				//Borramos el archivo
				$borrado = unlink(Yii::app()->basePath . '/runtime/temporal.sql');
				
				return true;
			}else{
				Yii::app()->user->setFlash('error',"Error: El archivo no existe");
				return false;
			}
		}catch(PDOException $excepcion){
			Yii::app()->user->setFlash('error',"Error: ".$excepcion->getMessage());
			
			//Restablecemos la base de datos a su estado anterior
			CopiaDeSeguridad::importarSQL(Yii::app()->basePath . '/runtime/temporal.sql');
			
			//Borramos el archivo
			$borrado = unlink(Yii::app()->basePath . '/runtime/temporal.sql');
			return false;
		}
	}
	
	/* --- IMPORTACIÓN --- */
}
?>