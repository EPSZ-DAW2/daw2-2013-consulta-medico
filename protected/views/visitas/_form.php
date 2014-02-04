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

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'IdPaciente'); ?>
		<?php //echo $form->textField($model,'IdPaciente'); ?>
		<?php //echo $form->error($model,'IdPaciente');?>
	</div>-->
	
	<div class="row">
		<?php echo $form->labelEx($model,'NombrePaciente'); ?>
		<?php echo $form->dropDownList($model,'IdPaciente',CHtml::listData(Pacientes::model()->findAll(),'IdPaciente','Nombre')); ?>
		<?php echo $form->error($model,'IdPaciente'); ?>
	</div>

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
		 'buttonImage'=>Yii::app()->baseUrl.'/css/calendar1.jpg',
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
  <?php echo $form->hiddenField($model,'Notas',array()); ?>
  <?php 
  $this->widget('zii.widgets.jui.CJuiAutoComplete',
    array(
      'model'=>$model,
      'attribute'=>'notas_name',
      'source'=>$this->createUrl('ListarEstados'),
      'htmlOptions'=>array('placeholder'=>'Any'),
      'options'=>
         array(
               'showAnim'=>'fold',
               'select'=>"js:function(hotel, ui) {
                  $('#notas_id').val(ui.item.id);
                         }"
                ),
      'cssFile'=>false,
    )); 

    ?>
    <?php echo CHtml::hiddenField('notas');
 ?>
		<?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'Estado',array('1'=>'Pendiente','2'=>'Realizada'), array('options' => array('1'=>array('selected'=>true))));?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->