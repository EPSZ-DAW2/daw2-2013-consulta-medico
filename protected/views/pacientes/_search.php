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
		<?php echo $form->labelEx($model,'Fecha_nacimiento'); ?>
		
		 <?php
		 if ($model->Fecha_nacimiento!='') {
		 $model->Fecha_nacimiento=date('Y/m/d',strtotime($model->Fecha_nacimiento));
		 }
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'Fecha_nacimiento',
		 'value'=>$model->Fecha_nacimiento,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>$model->Fecha_nacimiento,
		 'dateFormat'=>'yy/mm/dd',
		 'buttonImage'=>Yii::app()->baseUrl.'/css/calendar2.png',
		 'buttonImageOnly'=>true,
		 'buttonText'=>'Fecha',
		 'selectOtherMonths'=>true,
		 'showAnim'=>'slide',
		 'showButtonPanel'=>true,
		 'showOn'=>'button',
		 'showOtherMonths'=>true,
		 'changeMonth' => 'true',
		 'changeYear' => 'true',
		 ),
		 )); ?>
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
		<?php echo $form->labelEx($model,'Nombre Aseguradora'); ?>
		<?php echo $form->dropDownList($model,'idAseguradora',
		
			CHtml::listData(Aseguradoras::model()->findAll(),'idAseguradora','Nombre')
		); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->