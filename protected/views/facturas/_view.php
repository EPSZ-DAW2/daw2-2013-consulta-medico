<?php
/* @var $this FacturasController */
/* @var $data Facturas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFactura')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdFactura), array('view', 'id'=>$data->IdFactura)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Serie')); ?>:</b>
	<?php echo CHtml::encode($data->Serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Numero')); ?>:</b>
	<?php echo CHtml::encode($data->Numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
	<?php echo CHtml::encode($data->IdPaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Concepto')); ?>:</b>
	<?php echo CHtml::encode($data->Concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Importe')); ?>:</b>
	<?php echo CHtml::encode($data->Importe); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCobro')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br />

	*/ ?>

</div>