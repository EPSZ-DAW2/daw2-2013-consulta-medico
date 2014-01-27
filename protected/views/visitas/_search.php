<?php
/* @var $this VisitasController */
/* @var $model Visitas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdCita'); ?>
		<?php echo $form->textField($model,'IdCita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPaciente'); ?>
		<?php echo $form->textField($model,'IdPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_hora'); ?>
		<?php echo $form->textField($model,'Fecha_hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->