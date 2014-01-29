<?php
/* se deben pasar la plantilla a utilizar y los datos*/
generarplantilla($plantilla, $datos)
{
	$claves=array_keys($datos);
	$valores=array_values($datos);
	$resultado=str_replace($claves, $valores, $plantilla);
	
}

?>