<?php
/* @var $this VisitasController */
/* @var $model Visitas */
/* @var $form CActiveForm */
?>

<div class="wide form">
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

	<div class="row">
		<?php echo $form->labelEx($model,'IdPaciente'); ?>
		<?php echo $form->hiddenField($model, 'IdPaciente'); ?>
		<?php $paciente= ($model->paciente !== null) ? $model->paciente : new Pacientes;
			echo $form->textField($paciente, 'Nombre', array(
				'value'=>($model->paciente !== null) 
					? $paciente->Nombre . ' '. $paciente->Apellidos
					: 'Debe buscar el paciente por DNI/NIF, Nombre o Apellidos.'
				,				
				'disabled'=>true,
				'size'=>50,
				)
			);
			if ($model->paciente !== null) {
				//echo ' Cliente seleccionado.';
			} else {
				//echo '  DNI/NIF'; 
			}
		?>
		<?php echo $form->error($model,'IdPaciente'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'dninif'); ?>
		<?php
		// ext is a shortcut for application.extensions
		$form->widget('ext.AutoCompletar', array(
			'model'=>$model,
			'attribute'=>'dninif',
			//'name' => 'test_autocomplete',
			'source' => $this->createUrl('visitas/usersAutocomplete'),
		// attribute_value is a custom property that returns the 
		// name of our related object -ie return $model->related_model->name
			//'value' => $model->isNewRecord ? '': $model->paciente->DNI_NIF,
			'options' => array(
				'minLength'=>0,
				'autoFill'=>false,
				'focus'=> 'js:function( event, ui ) {
					$( "#'.CHtml::activeId($model,'dninif').'" ).val( ui.item.DNI_NIF );
					return false;
				}',
				'select'=>'js:function( event, ui ) {
					$("#'.CHtml::activeId($model,'IdPaciente').'").val(ui.item.IdPaciente);
					$("#'.CHtml::activeId($paciente, 'Nombre').'").val(ui.item.Nombre+" "+ui.item.Apellidos);
					return false;
				}'
			 ),
			'htmlOptions'=>array('class'=>'input-1', 'autocomplete'=>'off'),
			'methodChain'=>'.data( "autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li></li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.DNI_NIF +  "</a>" )
					.appendTo( ul );
			};'
		));
		?>
															
		
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