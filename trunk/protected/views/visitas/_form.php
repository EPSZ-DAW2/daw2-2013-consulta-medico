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
		 if ($model->Fecha_hora!='') {
		 $model->Fecha_hora=date('d-m-Y',strtotime($model->v));
		 }
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'Fecha_hora',
		 'value'=>$model->Fecha_hora,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>$model->Fecha_hora,
		 'dateFormat'=>'dd/mm/yy',
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
		 <?php echo $form->error($model,'Fecha_Hora'); ?>
		</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'Notas'); ?>
		<?php $this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'notas', 
                         //replace controller/action with real ids
             'url'=>array('controller/ListarEstados'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'40'), 
 
             'methodChain'=>".result(function(event,item){\$(\"#notas\").val(item[1]);})",
             ));
    ?>
    <?php echo CHtml::hiddenField('notas');
 ?>
		<?php echo $form->error($model,'Notas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'Estado',array('Pendiente'=>'Pendiente','Realizada'=>'Realizada'), array('options' => array('Pendiente'=>array('selected'=>true))));?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->