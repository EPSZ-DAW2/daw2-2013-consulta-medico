<?php
/* @var $this PacientesController */
/* @var $model Pacientes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pacientes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DNI_NIF'); ?>
		<?php echo $form->textField($model,'DNI_NIF',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'DNI_NIF'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha_nacimiento'); ?>
		<?php echo $form->textField($model,'Fecha_nacimiento'); ?>
		<?php echo $form->error($model,'Fecha_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodPostal'); ?>
		<?php echo $form->textField($model,'CodPostal'); ?>
		<?php echo $form->error($model,'CodPostal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Localidad'); ?>
		<?php echo $form->textField($model,'Localidad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Localidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Provincia'); ?>
		<?php echo $form->textField($model,'Provincia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Provincia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TelFijo'); ?>
		<?php echo $form->textField($model,'TelFijo'); ?>
		<?php echo $form->error($model,'TelFijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TelMovil'); ?>
		<?php echo $form->textField($model,'TelMovil'); ?>
		<?php echo $form->error($model,'TelMovil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre Aseguradora'); ?>
		<?php echo $form->dropDownList($model,'idAseguradora',
		
			CHtml::listData(Aseguradoras::model()->findAll(),'idAseguradora','Nombre')
		); ?>
		<?php echo $form->error($model,'idAseguradora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Notas'); ?>
		<?php echo $form->textField($model,'Notas',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->