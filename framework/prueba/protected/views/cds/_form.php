<?php
/* @var $this CdsController */
/* @var $model Cds */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cds-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titel'); ?>
		<?php echo $form->textField($model,'titel',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'titel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interpret'); ?>
		<?php echo $form->textField($model,'interpret',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'interpret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jahr'); ?>
		<?php echo $form->textField($model,'jahr'); ?>
		<?php echo $form->error($model,'jahr'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->