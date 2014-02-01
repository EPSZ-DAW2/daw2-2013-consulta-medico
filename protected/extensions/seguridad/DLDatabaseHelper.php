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
        $pdo = Yii::app()->db->pdoInstance;
        $mysql = "SET FOREIGN_KEY_CHECKS=0;\n\r";
        $statments = $pdo->query("show tables");
		$tablaActual=0;

        foreach ($statments as $value) 
        {
			if($tablas[$tablaActual])
			{
				$tableName = $value[0];
				
				$itemsQuery = $pdo->query("select * from `$tableName`");
				$values = "";
				$items = "";
				while ($itemQuery = $itemsQuery->fetch(PDO::FETCH_ASSOC)) 
				{
					$itemNames = array_keys($itemQuery);
					$itemNames = array_map("addslashes", $itemNames);
					$items = join('`,`', $itemNames);
					$itemValues = array_values($itemQuery);
					$itemValues = array_map("addslashes", $itemValues);
					$valueString = join("','", $itemValues);
					$valueString = "('" . $valueString . "'),";
					$values.="\n" . $valueString;
				} 
				if ($values != "") 
				{
					$insertSql = "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";\n\r"; 
					$mysql.=$insertSql; 
				} 
			}
			$tablaActual++;
        } 
		
		$mysql. = "SET FOREIGN_KEY_CHECKS=1;\n\r";

        ob_start();
        echo $mysql;    
        $content = ob_get_contents();
        ob_end_clean();
        $content = gzencode($content, 9);
		
		$saveName = date('YmdHms') . ".sql.gz";
		$request = Yii::app()->getRequest();
		$request->sendFile($saveName, $content);
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
