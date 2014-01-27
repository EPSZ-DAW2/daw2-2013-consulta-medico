<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdFactura'); ?>
		<?php echo $form->textField($model,'IdFactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Serie'); ?>
		<?php echo $form->textField($model,'Serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Numero'); ?>
		<?php echo $form->textField($model,'Numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPaciente'); ?>
		<?php echo $form->textField($model,'IdPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Concepto'); ?>
		<?php echo $form->textField($model,'Concepto',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Importe'); ?>
		<?php echo $form->textField($model,'Importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaCobro'); ?>
		<?php echo $form->textField($model,'FechaCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->