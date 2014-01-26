<?php
/* @var $this PerfilesController */
/* @var $data Perfiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFactura')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdFactura), array('view', 'id'=>$data->IdFactura)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFactura')); ?>:</b>
	<?php echo CHtml::encode($data->IdPaciente); ?>
	<br />


</div>