<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <h4><?php echo Yii::app()->user->getFlash('error'); ?></h4>
    </div>
<?php endif; 

//Si estamos en la primera pantalla
if ($modelo->scenario != 'conArchivo'){
?>
	<div class="yiiForm">
		<?php echo CHtml::beginForm(); ?>
		
		<h5>Selecciona esta opción para importar datos previamente extraídos desde el menú "Exportar"</h5>
		
		<!--Botón para importar datos-->
		<div class="action">
			<?php echo CHtml::submitButton('Importar Datos',array('name' => 'datos')); ?>
		</div>
		
		</br><h5>Selecciona esta opción para recargar la estructura de la base de datos (¡borrará todos los datos almacenados!)</h5>
		
		<!--Botón para reestructurar la base de datos-->
		<div class="action">
			<?php echo CHtml::submitButton('Recargar Estructura',array('name' => 'estructura', 'confirm' => "¿Está seguro que desea recargar la estructura de la base de datos? Recuerde que esta acción borrará TODOS los datos almacenados")); ?>
		</div>
		
		<?php echo CHtml::endForm(); ?>
	</div>
	
	<?php if(Yii::app()->user->hasFlash('informacion')):?>
    </br><div class="info">
        <?php echo Yii::app()->user->getFlash('informacion'); ?>
    </div>
	<?php endif; 
	
	
}else{
	$this->breadcrumbs=array('Importar'=>array('index'),'Datos',);

	//Inicio el widget
	$form=$this->beginWidget('CActiveForm', array('id'=>'importar-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype'=>'multipart/form-data'),)); ?>

	<div class="yiiForm">
		<?php echo CHtml::beginForm();?>
		
		<h5>El archivo de importación puede ser sql o xml</h5>
		
		<!--Diálogo para elegir el archivo-->
		<div class="simple">
		<?php echo $form->fileField($modelo, 'archivo');
			  echo $form->error($modelo, 'archivo'); ?>
	    </div></br>
		
		<!--Botón de check para comprobar las claves foráneas-->
		<div class="simple">
		<?php echo CHtml::activeCheckBox($modelo,'foraneas');
			  echo $form->label($modelo,'foraneas'); ?>
		</div></br>
		
		<div class="action">
		<?php echo CHtml::submitButton('Importar',array('name' => 'importarDatos', 'confirm' => "¿Está seguro que desea sobreescribir los datos almacenados")); ?>
		</div>
		
		<?php echo CHtml::endForm(); ?>
	</div>
	
	<?php $this->endWidget();
} ?>