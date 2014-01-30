<?php
$pdf = Yii::createComponent('application.extensions.MPDF52.mpdf');

$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
</table>

';

?>