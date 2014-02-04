
<?php 


$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>Id Facturas</b> </td><td> '. $model->IdFactura .'</td></tr>
<tr class="odd"><td> <b>Series</b> </td><td> '.$model->Serie .'</td></tr>
<tr class="even"><td> <b>Numero</b> </td><td> '. $model->Numero .'</td></tr>
<tr class="odd"><td> <b>Fecha</b> </td><td> '.$model->Fecha .'</td></tr>
<tr class="even"><td> <b>Id Paciente/b> </td><td> '.$model->IdPaciente .'</td></tr>
<tr class="even"><td> <b>Concepto</b> </td><td> '.$model->Concepto .'</td></tr>
<tr class="odd"><td> <b>Importe</b> </td><td> '.$model->Importe .'</td></tr>
<tr class="even"><td> <b>Fecha Cobro</b> </td><td> '.$model->FechaCobro .'</td></tr>
<tr class="odd"><td> <b>Notas</b> </td><td> '.$model->Notas .'</td></tr>

</table>

';
	//echo CHtml::submitButton('Pdf'); 
	//plantilla::generarplantilla('facturas', array($model->IdFactura,$model->Serie,$model->Numero,$model->Fecha,$model->IdPaciente,$model->Concepto,$model->Importe,$model->FechaCobro,$model->Notas));
		//plantilla::generarplantilla('facturas', $html);
	
?>


