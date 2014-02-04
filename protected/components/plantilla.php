<?php
/* se deben pasar la plantilla a utilizar y los datos*/


class plantilla{
	public static function generarplantilla($plantilla, $datos)
{
	mpdf = YII::app()ePdf->mpdf();
	$claves=array_keys($datos);
	$valores=array_values($datos);
	$resultado=str_replace($claves, $valores, $plantilla);
	
	$mpdf=new mPDF('win-1252',$plantilla,'','',15,15,25,12,5,7);
$mpdf->WriteHTML($resultado);
$mpdf->Output('Plantilla'.$model->num_control.'.pdf','D');
exit;
	
}
}


?>