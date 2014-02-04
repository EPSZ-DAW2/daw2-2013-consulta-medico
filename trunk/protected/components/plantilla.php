<?php
/* se deben pasar la plantilla a utilizar y los datos*/


class plantilla
{

	public static function obtenerPlantilla( $plantilla)
	{
		$archivo= Yii::getPathOfAlias( 'application.Plantillas.'.$plantilla).'.html';
		if (is_readable( $archivo)) {
			$resultado= file_get_contents( $archivo);
		} else {
			$resultado= false;
		}
		return $resultado;
	}
	
	public static function generarPlantilla($plantilla, $datos, $enPDF=false)
	{
		$contenido= self::obtenerPlantilla( $plantilla);
		
		if ($contenido == false) {
			$resultado= 'No hay plantilla';
		} else {
			$claves=array_keys($datos);
			$valores=array_values($datos);
			foreach( $claves as $indice => $clave) {
				$claves[$indice]= '{'.$clave.'}';
			}
			$resultado= str_replace( $claves, $valores, $contenido);
		}	
		if ($enPDF) {
			$mpdf = YII::app()->ePdf->mpdf();
			$mpdf->WriteHTML( $resultado);
			$mpdf->Output();
		} else {
			echo $resultado;
		}
	}
}


?>