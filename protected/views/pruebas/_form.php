<?php
/* @var $this PruebasController */
/* @var $model Pruebas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pruebas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdCita'); ?>
		<?php echo $form->textField($model,'IdCita'); ?>
		<?php echo $form->error($model,'IdCita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdPaciente'); ?>
		<?php echo $form->textField($model,'IdPaciente'); ?>
		<?php echo $form->error($model,'IdPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdTipoDiagnostico'); ?>
		<?php echo $form->textField($model,'IdTipoDiagnostico'); ?>
		<?php echo $form->error($model,'IdTipoDiagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha_Hora'); ?>
		<?php echo $form->textField($model,'Fecha_Hora'); ?>
		<?php echo $form->error($model,'Fecha_Hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tratamiento'); ?>
		<?php echo $form->textField($model,'Tratamiento',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Tratamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->