<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdUsuario), array('view', 'id'=>$data->IdUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaHoraUltimaConexion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaHoraUltimaConexion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numFallos')); ?>:</b>
	<?php echo CHtml::encode($data->numFallos); ?>
	<br />


</div>