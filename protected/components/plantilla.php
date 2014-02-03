<?php
/* se deben pasar la plantilla a utilizar y los datos*/
$pdf = Yii::createComponent('application.extensions.MPDF571UPGRADE57.mpdf');


public function generarplantilla($plantilla, $datos)
{
	$claves=array_keys($datos);
	$valores=array_values($datos);
	$resultado=str_replace($claves, $valores, $plantilla);
	
}
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->WriteHTML($resultado);
$mpdf->Output('Plantilla'.$model->num_control.'.pdf','D');
exit;

?>