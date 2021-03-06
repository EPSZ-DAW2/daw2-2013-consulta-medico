<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'facturas-form','enableAjaxValidation'=>false,)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

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
		<?php
		 if ($model->Fecha!='') $model->Fecha=date('d-m-Y',strtotime($model->Fecha));

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
		?>
		<?php echo $form->error($model,'IdPaciente'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'dninif'); ?>
		<?php
		$form->widget('ext.AutoCompletar', array(
			'model'=>$model,
			'attribute'=>'dninif',
			'source' => $this->createUrl('facturas/autoCompletar'),
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
		
		<?php
		 if ($model->FechaCobro!='') {
		 $model->FechaCobro=date('d-m-Y',strtotime($model->FechaCobro));
		 }
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'FechaCobro',
		 'value'=>$model->FechaCobro,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>$model->FechaCobro,
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
		<?php echo $form->error($model,'FechaCobro'); ?>
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

</div>