<?php
/* @var $this PerfilesController */
/* @var $data Perfiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripción')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

</div>