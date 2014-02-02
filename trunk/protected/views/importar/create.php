<?php
$this->breadcrumbs=array(
	'Importar',
);
if ($model->scenario == 'withFile'){
	$form=$this->beginWidget('CActiveForm', array(
        'id'=>'importar-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype'=>'multipart/form-data'),
	));?>

	<div class="yiiForm">
		<?php echo CHtml::beginForm();?>
		<div class="simple">
		<?php echo $form->fileField($model, 'archivo');
			  echo $form->error($model, 'archivo'); ?>
	    </div>
		<div class="simple">
		<?php echo $form->checkBox($model,'foraneas'); 
			  echo $form->label($model,'foraneas'); ?>
		</div>
		<div class="action">
		<?php echo CHtml::submitButton('Importar'); ?>
		</div>	 
		<?php echo CHtml::endForm(); ?>
	</div>
	<?php $this->endWidget();}
else{?>
	<div class="yiiForm">
		<?php echo CHtml::beginForm(); ?>
		<div class="simple">
			<?php echo  CHtml::activeRadioButton($model,'opcion',array('value'=>0)) . 'Estructura';
				  echo  CHtml::activeRadioButton($model,'opcion',array('value'=>1)) . 'Datos'; ?>
		</div>
		<div class="action">
			<?php echo CHtml::submitButton('Importar'); ?>
		</div>
		<?php echo CHtml::endForm(); ?>
	</div>
<?php
}?>