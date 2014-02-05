<?php
/* @var $this PruebasController */
/* @var $data Pruebas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPrueba')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdPrueba), array('pruebas/view', 'id'=>$data->IdPrueba));
	/*echo Yii::app()->createUrl('pruebas/view', array('id'=>$data->IdPrueba));
	*/?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCita')); ?>:</b>
	<?php echo CHtml::encode($data->IdCita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
	<?php echo CHtml::encode($data->IdPaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoDiagnostico')); ?>:</b>
	<?php echo CHtml::encode($data->IdTipoDiagnostico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Hora')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tratamiento')); ?>:</b>
	<?php echo CHtml::encode($data->Tratamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br/>

</div>

<!--<div>
<iframe width="760" height="800" src="<?php 
	echo $this->createUrl( 'plantilla');
?>" scrolling="no" frameborder="no" ></iframe>
</div>--> 