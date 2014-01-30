<?php
/**
 *
 * Export & import sql
 *
 * @author davidhhuan
 */
class DLDatabaseHelper
{
    /**
     * Export the sql to a file
     *
     * @author davidhhuan
     * @param bool $withData: Whether to export the insert-data at the same time
     * @param bool $dropTable: Add to drop the table or not
     * @param string $saveName: the saved file name
     * @param string $savePath
     *
     * @return mixed
     */
    public static function export($withData = true, $dropTable = false, $saveName = null, $savePath = false)
    {
        $pdo = Yii::app()->db->pdoInstance;
        $mysql = '';
        $statments = $pdo->query("show tables");
		//Empiezo a meter mano
		$Auxiliar;
		
		
		//Cambio facturas por pacientes
		//$Auxiliar=$statments[2];
		//$statments[2]=$statments[3];
		//$statments[3]=$Auxiliar;
		
		//Cambio por usuarios 
		//$Auxiliar=$statments[3];
		//$statments[3]=$statments[8];
		//$statments[8]=$Auxiliar;
		
		
		//Termino de meter mano
       // foreach ($statments as $value) 
       // {
            //$tableName = $value[0];
			
			
			$mysql.="CREATE DATABASE IF NOT EXISTS `consultamedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `consultamedico`;\n";
			//Tabla a
			$tableName = "a";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin a
			
			//Tabla aseguradoras
			$tableName = "aseguradoras";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin aseguradoras
			
			//Tabla pacientes
			$tableName = "pacientes";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin pacientes
			
			//Tabla usuarios
			$tableName = "usuarios";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin usuarios
			
			//Tabla perfiles
			$tableName = "perfiles";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin perfiles
			
			//Tabla perfilesusuarios
			$tableName = "perfilesusuarios";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin perfilesusuarios
			
			//Tabla tiposdiagnosticos
			$tableName = "tiposdiagnosticos";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin tiposdiagnosticos
			
			
			//Tabla visitas
			$tableName = "visitas";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin visitas
			
			//Tabla pruebas
			$tableName = "pruebas";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin pruebas
			
			//Tabla facturas
			$tableName = "facturas";
            if ($dropTable === true)
            {
                $mysql.="DROP TABLE IF EXISTS `$tableName`;\n";
            }
            $tableQuery = $pdo->query("show create table `$tableName`");
            $createSql = $tableQuery->fetch();
            $mysql.=$createSql['Create Table'] . ";\r\n\r\n";
            if ($withData != 0) 
            {
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
			//Fin facturas
			
			
            //$mysql.="/*-----------------------------------------------------*/\n\r"; 
       // } 

        ob_start();
        echo $mysql;    
        $content = ob_get_contents();
        ob_end_clean();
        $content = gzencode($content, 9);
        if (is_null($saveName))
        {
            $saveName = date('YmdHms') . ".sql.gz";
        }

        if ($savePath === false)
        {
            //header("Content-Type: application/force-download");
            //header("Content-Type: application/octet-stream");
            //header("Content-Type: application/download");
            //header("Content-Description: Download SQL Export");  
            //header('Content-Disposition: attachment; filename='.$saveName);
            //echo $content;
            //die();
            $request = Yii::app()->getRequest();
            $request->sendFile($saveName, $content);
        }
        else
        {
            $filePath = $savePath ? $savePath . '/' . $saveName : $saveName;
            file_put_contents($filePath, $content);
            echo "Database file saved: " . $saveName;
        }
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
        /*$pdo = Yii::app()->db->pdoInstance;
        //try 
        //{*/ 
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
       /* } 
        catch (PDOException $e) 
        { 
            echo $e->getMessage();
            exit; 
        }*/
    }
}
