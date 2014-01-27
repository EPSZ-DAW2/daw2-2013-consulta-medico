<?php
/* @var $this AseguradorasController */
/* @var $data Aseguradoras */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAseguradora')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAseguradora), array('view', 'id'=>$data->idAseguradora)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br />


</div>