<?php
/* @var $this PerfilesController */
/* @var $data Perfiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPerfil')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdPerfil), array('view', 'id'=>$data->IdPerfil)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />


</div>