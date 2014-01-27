<?php
/* @var $this PacientesController */
/* @var $data Pacientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdPaciente), array('view', 'id'=>$data->IdPaciente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->Apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DNI_NIF')); ?>:</b>
	<?php echo CHtml::encode($data->DNI_NIF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodPostal')); ?>:</b>
	<?php echo CHtml::encode($data->CodPostal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Localidad')); ?>:</b>
	<?php echo CHtml::encode($data->Localidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Provincia')); ?>:</b>
	<?php echo CHtml::encode($data->Provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelFijo')); ?>:</b>
	<?php echo CHtml::encode($data->TelFijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelMovil')); ?>:</b>
	<?php echo CHtml::encode($data->TelMovil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAseguradora')); ?>:</b>
	<?php echo CHtml::encode($data->idAseguradora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br />

	*/ ?>

</div>