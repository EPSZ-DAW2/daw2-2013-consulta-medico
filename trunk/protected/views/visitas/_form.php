<?php
/* @var $this VisitasController */
/* @var $model Visitas */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visitas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php
		$this->widget('ext.AutoCompletar', array(
			'model'=>$model,
			'attribute'=>'IdPaciente',
			'name'=>'visitas_autocomplete',
			'source'=>$this->createUrl('visitas/usersAutocomplete'),  // Controller/Action path for action we created in step 4.
			// additional javascript options for the autocomplete plugin
			'options'=>array(
				'minLength'=>'0',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;',
			),        
		));?>
		<?php echo $form->error($model,'IdPaciente');?>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		
		 <?php
		 if ($model->Fecha!='') {
		 $model->Fecha=date('d-m-Y',strtotime($model->Fecha));
		 }
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'Fecha',
		 'value'=>$model->Fecha,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>$model->Fecha,
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
		 <?php echo $form->error($model,'Fecha'); ?>
		</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'Hora'); ?>
		<?php echo $form->textField($model,'Hora'); ?>
		<?php echo $form->error($model,'Hora');?>
	</div>
	
	<div class="row"> 
			
  <?php echo $form->label($model,'Notas'); ?>
  <?php echo $form->textField($model,'Notas'); ?>
  <?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'Estado',array('No Realizada'=>'No Realizada','Realizada'=>'Realizada'), array('options' => array('1'=>array('selected'=>true))));?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->