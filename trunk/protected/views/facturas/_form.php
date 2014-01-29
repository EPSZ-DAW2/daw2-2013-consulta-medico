<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Serie'); ?>
		<?php echo $form->textField($model,'Serie'); ?>
		<?php echo $form->error($model,'Serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Numero'); ?>
		<?php echo $form->textField($model,'Numero'); ?>
		<?php echo $form->error($model,'Numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdPaciente'); ?>
		<?php echo $form->textField($model,'IdPaciente'); ?>
		<?php echo $form->error($model,'IdPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Concepto'); ?>
		<?php echo $form->textField($model,'Concepto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Concepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Importe'); ?>
		<?php echo $form->textField($model,'Importe'); ?>
		<?php echo $form->error($model,'Importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaCobro'); ?>
		<?php echo $form->textField($model,'FechaCobro'); ?>
		<?php echo $form->error($model,'FechaCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->