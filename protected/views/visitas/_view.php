<?php
/* @var $this VisitasController */
/* @var $data Visitas */

if($fecha==$data->Fecha){?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCita')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCita), array('view', 'id'=>$data->IdCita)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
	<?php echo CHtml::encode($data->IdPaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Hora')); ?>:</b>
	<?php echo CHtml::encode($data->Hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />
</div>
<?php
}