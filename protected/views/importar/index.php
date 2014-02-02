<?php
//Si estamos en la primera pantalla
if ($model->scenario != 'conArchivo'){
?>
	<div class="yiiForm">
		<?php echo CHtml::beginForm(); ?>
		
		<h5>Selecciona esta opción para importar datos previamente extraídos desde el menú "Exportar"</h5>
		
		<!--Botón de radio para importar datos-->
		<div class="simple">
			<?php echo CHtml::activeRadioButton($model,'opcion',array('value'=>0)) . 'Datos'; ?>
		</div>
		
		</br><h5>Selecciona esta opción para recargar la estructura de la base de datos (¡borrará todos los datos almacenados!)</h5>
		
		<!--Botón de radio para reestructurar la base de datos-->
		<div class="simple">
			<?php echo CHtml::activeRadioButton($model,'opcion',array('value'=>1)) . 'Estructura';?>
		</div></br>
		
		<div class="action">
			<?php echo CHtml::submitButton('Aceptar'); ?>
		</div>
		
		<?php echo CHtml::endForm(); ?>
	</div>
<?php }else{
	//Inicio el widget
	$form=$this->beginWidget('CActiveForm', array('id'=>'importar-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype'=>'multipart/form-data'),)); ?>

	<div class="yiiForm">
		<?php echo CHtml::beginForm();?>
		
		<h5>El archivo de importación puede ser sql o xml</h5>
		
		<!--Diálogo para elegir el archivo-->
		<div class="simple">
		<?php echo $form->fileField($model, 'archivo');
			  echo $form->error($model, 'archivo'); ?>
	    </div></br>
		
		<!--Botón de check para comprobar las claves foráneas-->
		<div class="simple">
		<?php echo CHtml::activeCheckBox($model,'foraneas');
			  echo $form->label($model,'foraneas'); ?>
		</div></br>
		
		<div class="action">
		<?php echo CHtml::submitButton('Importar'); ?>
		</div>
		
		<?php echo CHtml::endForm(); ?>
	</div>
	
	<?php $this->endWidget();
} ?>