<?php
/**
 *
 * Exportar & Importar 
 *
 * 
 */
class DLDatabaseHelper
{
    
    //FUNCION QUE EXPORTA LOS DATOS DE LA BASE DE DATOS
    public static function export($tablas)
    {
		$bbDD = Yii::app()->db->pdoInstance;
        $todasTablas = $bbDD->query("show tables");
		$tablaActual=0;
		$salida = "<?xml version=\"1.0\" ?>\n"; 
		$salida .= "<schema>"; 

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
						$salida .= "<tabla nombre=\"".$nombreTabla."\">"; 
						$contador2=0;
						$salida.="<campo";
						foreach($itemNames as $item){
							$salida .= " ".$item."=\"".$itemValues[$contador2]."\"";
							$contador2++;
						}
						$salida .= "/>";
						$contador++;
					}
					else{
						$contador2=0;
						$salida.="<campo";
						foreach($itemNames as $item){
							$salida .= " ".$item."=\"".$itemValues[$contador2]."\"";
							$contador2++;
						}
						$salida .= "/>";
					}
				}
				
				if($contador!=0){
					$salida .= "</tabla>"; 
				}
			}
			$tablaActual++;
        }  

		$salida .= "</schema>"; 
		
        ob_start();
        echo $salida;    
        $contenido = ob_get_contents();
        ob_end_clean();
		
		$nombreFichero = date('YmdHms') . ".xml";
		$peticion = Yii::app()->getRequest();
		$peticion->sendFile($nombreFichero, $contenido);
    }


    /**
     * import sql from a *.sql file
     *
     * @author davidhhuan
     * @param string $file: with the path and the file name
     *
     * @return mixed
     */
    public static function import($file = '')
    {
        $pdo = Yii::app()->db->pdoInstance;
        try 
        { 
            if (file_exists($file)) 
            {
                $sqlStream = file_get_contents($file);
                $sqlStream = rtrim($sqlStream);
                $newStream = preg_replace_callback("/\((.*)\)/", create_function('$matches', 'return str_replace(";"," $$$ ",$matches[0]);'), $sqlStream); 
                $sqlArray = explode(";", $newStream); 
                foreach ($sqlArray as $value) 
                { 
                    if (!empty($value))
                    {
                        $sql = str_replace(" $$$ ", ";", $value) . ";";
                        $pdo->exec($sql);
                    } 
                } 
                //echo "succeed to import the sql data!";
                return true;
            } 
        } 
        catch (PDOException $e) 
        { 
            echo $e->getMessage();
            exit; 
        }
    }
}
