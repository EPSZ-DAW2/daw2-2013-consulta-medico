<?php
/*se debe recibir el tipo de plantilla a utilizar y los datos para rellenar dicha plantilla
*/
generarplantilla($plantilla, $datos){

$claves = array_keys($datos);
$valores = array_keys($datos);
$resultado = str_replace($claves, $valores, $plantilla);
return $resultado;
}
?>