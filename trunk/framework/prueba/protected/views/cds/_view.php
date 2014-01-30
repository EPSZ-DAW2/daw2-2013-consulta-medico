<?php
/* @var $this CdsController */
/* @var $data Cds */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titel')); ?>:</b>
	<?php echo CHtml::encode($data->titel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interpret')); ?>:</b>
	<?php echo CHtml::encode($data->interpret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jahr')); ?>:</b>
	<?php echo CHtml::encode($data->jahr); ?>
	<br />


</div>