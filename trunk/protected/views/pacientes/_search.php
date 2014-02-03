<?php
/* @var $this PacientesController */
/* @var $model Pacientes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdPaciente'); ?>
		<?php echo $form->textField($model,'IdPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DNI_NIF'); ?>
		<?php echo $form->textField($model,'DNI_NIF',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_nacimiento'); ?>
		<?php echo $form->textField($model,'Fecha_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodPostal'); ?>
		<?php echo $form->textField($model,'CodPostal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Localidad'); ?>
		<?php echo $form->textField($model,'Localidad',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Provincia'); ?>
		<?php echo $form->textField($model,'Provincia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelFijo'); ?>
		<?php echo $form->textField($model,'TelFijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelMovil'); ?>
		<?php echo $form->textField($model,'TelMovil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idAseguradora'); ?>
		<?php echo $form->textField($model,'idAseguradora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->